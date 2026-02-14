<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Anggota;
use App\Models\Artikel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\File;

class AdminController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);
        $admin = Admin::whereUsername($request->username)->wherePassword($request->password);
        if($admin->exists()){
            $request->session()->put("id_admin", $admin->first(["id_admin"])->id_admin);
            return redirect()->route("admin.index");
        } else {
            return back()->withErrors("Username atau password salah!");
        }
    }
    public function store(Request $request): RedirectResponse
    {
        if($this->validateAdmin($request)) return redirect()->route("admin.login");
        $request->validate([
            "judul" => "required|max:255",
            "isi" => "required",
            "image" => ["required", File::image()->max(5 * 1024)]
        ]);
        $image = $request->file("image");
        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)."-".time().".".$image->getClientOriginalExtension();
        $image->move(public_path()."/images", $filename);

        Artikel::create([
            "judul" => $request->judul,
            "isi" => $request->isi,
            "image" => $filename
        ]);
        return redirect()->route("admin.index")->with("message", "Data berhasil dibuat!");
    }
    public function update(Request $request): RedirectResponse
    {
        if($this->validateAdmin($request)) return redirect()->route("admin.login");
        $request->validate([
            "id_artikel" => "required",
            "judul" => "required:max:255",
            "isi" => "required",
            "image" => File::image()->max(5 * 1024)
        ]);
        $artikel = Artikel::whereIdArtikel($request->id_artikel);
        if($request->hasFile("image")){
            unlink(public_path()."/images/".$artikel->first(["image"])->image);
            $image = $request->file("image");
            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)."-".time().".".$image->getClientOriginalExtension();
            $image->move(public_path()."/images", $filename);
            $artikel->update([ "image" => $filename ]);
        }
        $artikel->update([
            "judul" => $request->judul,
            "isi" => $request->isi
        ]);
        return redirect()->route("admin.index")->with("message", "Data berhasil diupdate!");
    }
    public function destroy(Request $request): RedirectResponse
    {
        if($this->validateAdmin($request)) return redirect()->route("admin.login");
        $request->validate([ "id_artikel" => "required" ]);
        $artikel = Artikel::whereIdArtikel($request->id_artikel);
        unlink(public_path()."/images/".$artikel->first(["image"])->image);
        $artikel->delete();
        return redirect()->route("admin.index")->with("message", "Data berhasil dihapus!");
    }
    public function login_form(){
        return view("admin.login");
    }
    public function view(Request $request){
        if($this->validateAdmin($request)) return redirect()->route("admin.login");
        $artikels = Artikel::all()->each(function(Artikel $artikel){
            $artikel->time = Carbon::parse($artikel->created_at)->format("d F Y");
        });
        return view("admin.index", compact("artikels"));
    }
    public function create(Request $request){
        if($this->validateAdmin($request)) return redirect()->route("admin.login");
        return view("admin.store");
    }
    public function edit(Request $request, string $id_artikel){
        if($this->validateAdmin($request)) return redirect()->route("admin.login");
        $artikel = Artikel::whereIdArtikel($id_artikel)->first();
        return view("admin.store", compact("artikel"));
    }
    public function validateAdmin(Request $request): bool
    {
        return !$request->session()->has("id_admin") ||
            !Admin::whereIdAdmin($request->session()->get("id_admin"));
    }
}

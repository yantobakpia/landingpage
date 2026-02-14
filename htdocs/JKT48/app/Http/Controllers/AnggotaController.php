<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class AnggotaController extends Controller
{
    public function show(Request $request){
        if($this->validateAdmin($request)) return redirect()->route("admin.login");
        $anggotas = Anggota::all();
        return view("admin.anggota", compact("anggotas"));
    }
    public function store(Request $request){
        if($this->validateAdmin($request)) return redirect()->route("admin.login");
        $request->validate([
            "nama" => "required|max:100",
            "image" => ["required", File::image()->max(1024 * 5)]
        ]);
        $image = $request->file("image");
        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)."-".time().".".$image->getClientOriginalExtension();
        $image->move(public_path()."/images", $filename);

        Anggota::create([
            "nama" => $request->nama,
            "image" => $filename
        ]);
        return back()->with("message", "Data berhasil dibuat!");
    }
    public function update(Request $request){
        if($this->validateAdmin($request)) return redirect()->route("admin.login");
        $request->validate([
            "name" => "required|max:100",
            "image" => File::image()->max(512)
        ]);
        $anggota = Anggota::whereIdAnggota($request->id_anggota);
        if($request->hasFile("image")){
            unlink(public_path()."/images/".$anggota->first(["image"])->image);
            $image = $request->file("image");
            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)."-".time().".".$image->getClientOriginalExtension();
            $image->move(public_path()."/images", $filename);
            $anggota->update([ "image" => $filename ]);
        }

        $anggota->update([ "name" => $request->name ]);
        return back()->with("message", "Data berhasil diupdate!");
    }
    public function destroy(Request $request){
        if($this->validateAdmin($request)) return redirect()->route("admin.login");
        $request->validate([ "id_anggota" => "required" ]);
        $anggota = Anggota::whereIdAnggota($request->id_anggota);
        unlink(public_path()."/images/".$anggota->first(["image"])->image);
        $anggota->delete();
        return back()->with("message", "Data berhasil dihapus!");
    }
    public function validateAdmin(Request $request): bool
    {
        return !$request->session()->has("id_admin") ||
            !Admin::whereIdAdmin($request->session()->get("id_admin"));
    }
}

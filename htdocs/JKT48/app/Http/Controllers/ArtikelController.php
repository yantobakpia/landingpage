<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function show(){
        $artikels = Artikel::all();
        return view("index", compact("artikels"));
    }
    public function detail(string $id){
        $artikel = Artikel::whereIdArtikel($id)->first();
        return view("detail", compact("artikel"));
    }
    public function anggota(){
        $anggotas = Anggota::all();
        return view("anggota", compact("anggotas"));
    }
}

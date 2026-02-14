<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bukuController extends Controller
{
    public function get(){
        $databim=DB ::select('select * from buku');
        return view('buku',['data'=>$databim]);
    }
    public function postget(Request $req){
        return view('bukutambah',["id"=>$req -> id]);
    }
    public function post(Request $req){
        $kode = $req->kode;
        $judul = $req->judul;
        $penulis = $req->penulis;
        $penerbit = $req->penerbit;
        $tahun = $req->tahun;
        $stok = $req->stok;
        DB::insert('insert into buku values (null, ?, ?, ?, ?, ?, ?)',
    [$kode, $judul, $penulis, $penerbit, $tahun, $stok]);
        return redirect('/buku');
    }

    public function delete(Request $req){
        DB:: delete('delete from buku where id=?',[$req->id]);
        return redirect('/buku');

    }
    public function updateget(Request $req){
        return view('/bukuupdate',["id"=>$req -> id]);
    }
    public function update(Request $req){
        DB:: update("update buku set kode=?, judul=?, penulis=?, penerbit=?, tahun=?, stok=? WHERE id=?",
        [$req->kode, $req->judul, $req->penulis, $req->penerbit, $req->tahun, $req->stok, $req->id]);
        return redirect("/buku");
    }
}

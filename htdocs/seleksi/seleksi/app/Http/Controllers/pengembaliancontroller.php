<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pengembaliancontroller extends Controller
{
   public function get(){
    $p=DB::select ("select anggota.nama as peminjam,buku.judul,petugas.nama as petugas,pengembalian.tanggal_kembali from pengembalian
    inner join anggota on anggota.id=pengembalian.id_anggota
    inner join buku on buku.id=pengembalian.id_buku
    inner join petugas on petugas.id=pengembalian.id_petugas");
    return view("pengembalian",["data"=>$p]);
   }
}

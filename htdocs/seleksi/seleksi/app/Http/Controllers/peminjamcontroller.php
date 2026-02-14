<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class peminjamcontroller extends Controller
{
    public function get(){
        $DBUI=DB ::select("select peminjaman.id,anggota.nama as peminjam,buku.judul,
        peminjaman.tanggal_pinjam,peminjaman.tanggal_kembali,petugas.nama as petugas from peminjaman
        inner join buku on buku.id=peminjaman.id_buku
        inner join anggota on anggota.id=peminjaman.id_anggota
        inner join petugas on petugas.id=peminjaman.id_petugas");
        return view('peminjaman',['data'=>$DBUI]);
    }
    public function gettambah(){
    $DBUI=DB ::select("select kode from buku");
    $anggota=DB::select("select kode from anggota");
    $petugas=DB::select("select id from petugas");

    return view("/peminjamantambah",["kode_buku"=>$DBUI,"kode_anggota"=>$anggota,"id_petugas"=>$petugas]);
    }
    public function post(Request $req){
        
        $tanggal_pinjam=$req->tanggal_pinjam;
        $tanggal_kembali=$req->tanggal_kembali;
        $kode_anggota = $req->kode_anggota;
        $kode_buku = $req->kode_buku;
        $id_petugas=$req->id_petugas;
        DB::insert("INSERT INTO peminjaman VALUES (NULL, ?, ?,
            (SELECT id FROM buku WHERE kode=?),
            (SELECT id FROM anggota WHERE kode=?), ?)", 
            [$tanggal_pinjam, $tanggal_kembali, $kode_buku, $kode_anggota, $id_petugas]);
        DB::update("UPDATE buku SET stok = stok - 1 WHERE kode=?", [$kode_buku]);
        return redirect("/peminjam");
    }
    public function kembali(Request $req){
        $denda= 1000;
        DB::insert("INSERT INTO pengembalian SELECT id, DATE(NOW()), 
        (IF(TIMESTAMPDIFF(DAY, tanggal_kembali, NOW()) > 0,
        TIMESTAMPDIFF(DAY, tanggal_kembali, NOW()) * ?, 0)),
        id_buku, id_anggota, id_petugas FROM peminjaman WHERE id=?", [$denda, $req->id]);

        DB::update("UPDATE buku SET stok = stok + 1 WHERE 
        id = (SELECT id_buku FROM peminjaman WHERE id=?)", [$req->id]);

        DB::delete("DELETE FROM peminjaman WHERE id=?", [$req->id]);
        return redirect("/peminjam");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class anggotaController extends Controller
{
  public function get(){
    $dbmek=DB ::select ('select * from anggota');
    return view('anggota',['data'=>$dbmek]);
  }
  public function postget(Request $req){
    return view("anggotatambah",["id"=>$req->id]);
  }
  public function post(Request $req){
    Log::alert($req);
    $kode=$req->kode;
    $nama=$req->nama;
    $jk=$req->jk;
    $jurusan=$req->jurusan;
    $no_telp=$req->no_telp;
    $alamat=$req->alamat;
    DB::insert("insert into anggota values (null,?,?,?,?,?,?)",
    [$kode,$nama,$jk,$jurusan,$no_telp,$alamat]);
    return redirect('/anggota');
  }

  public function delete(Request $req ){
    DB::delete("delete from anggota where id=?",[$req->id]);
  }
  public function updateget(Request $req){
    return view("/anggotaupdate",["id"=>$req->id]);

  }
  public function update(Request $req){
    DB::update("update anggota set kode=?,nama=?,jk=?,jurusan=?,no_telp=?,alamat=? where id=?",
    [$req->kode, $req->nama, $req->jk, $req->jurusan, $req->no_telp, $req->alamat, $req->id]);
    return redirect("/anggota");
  }
}

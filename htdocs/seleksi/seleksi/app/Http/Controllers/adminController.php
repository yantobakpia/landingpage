<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function get(){
        $datakita=DB::select('select*from petugas');
        return view('admin',['data'=>$datakita]);
    }
    public function postget(Request $req){
        return view ("admintambah",["id"=>$req->id]);
    }
    public function post(Request $req){
      $kode=$req->kode;
        $nama=$req->nama;
        $jabatan=$req->jabatan;
        $no_telp=$req->no_telp;
        $alamat=$req->alamat;
        DB::insert("insert into petugas values(null,?,?,?,?,?)",
        [$kode,$nama,$jabatan,$no_telp,$alamat]);
        return redirect("/admin");

    }
    public function delete(Request $req){
        DB:: delete("delete from petugas where kode=?",[$req->id]);
      }
      public function updateget(Request $req){
        return view("/adminupdate",["id"=>$req->id]);
      }
     
      public function update(Request $req){
        DB:: update("update petugas set nama=?, jabatan=?, no_telp=?, alamat=? where id=?",
    [$req->nama, $req->jabatan,$req->no_telp,$req->alamat, $req->id]);
    return redirect("/admin");

      }


}

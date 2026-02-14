<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\anggotaController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\peminjamcontroller;
use App\Http\Controllers\pengembaliancontroller;
use Illuminate\Support\Facades\Route;
Route::get('/',[IndexController::class,"get"]);
Route::get('/admin',[adminController::class,"get"]);
Route::get("/admin/delete",[adminController::class,"delete"]);
Route::get("/admin/update",[adminController::class,"updateget"]);
Route::post("/admin/update",[adminController::class,"update"]);
Route::post("/admin/post",[adminController::class,"post"]);
Route::get("/admin/post",[adminController::class,"postget"]);

Route::get('/buku',[bukuController::class,"get"]);
Route::post('/buku/post',[bukuController::class,"post"]);
Route::get('/buku/post',[bukuController::class,"postget"]);
Route::get ('/buku/delete',[bukuController::class,"delete"]);
Route::post ('/buku/update',[bukuController::class,"update"]);
Route::get('/buku/update',[bukuController::class,'updateget']);

Route::get('/anggota',[anggotaController::class,"get"]);
Route::get('/anggota/delete',[anggotaController::class,"delete"]);
Route::post('/anggota/update',[anggotaController::class,"update"]);
Route::get("/anggota/update",[anggotaController::class,'updateget']);
Route::get('/anggota/post',[anggotaController::class,"postget"]);
Route::post('/anggota/post',[anggotaController::class,"post"]);

Route::get("/peminjam",[peminjamcontroller::class,"get"]);
Route::get("/peminjam/tambah",[peminjamcontroller::class,"gettambah"]);
Route::post("/peminjam/post",[peminjamcontroller::class,"post"]);
Route::get("/peminjam/kembali",[peminjamcontroller::class,"kembali"]);

Route::get("/pengembalian",[pengembaliancontroller::class,"get"]);
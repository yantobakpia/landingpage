<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ArtikelController;

Route::controller(AdminController::class)->prefix("admin")->group(function (){
    Route::get("/", "view")->name("admin.index");
    Route::get("/login", "login_form")->name("admin.login");
    Route::post("/login", "login")->name("admin.login");

    Route::get("/create", "create")->name("admin.store");
    Route::get("/edit/{id_artikel}", "edit")->name("admin.update");
    Route::post("/", "store");
    Route::put("/", "update");
    Route::delete("/", "destroy");

    Route::controller(AnggotaController::class)->prefix("anggota")->group(function (){
        Route::get("/", "show")->name("admin.anggota");
        Route::post("/", "store");
        Route::put("/", "update");
        Route::delete("/", "destroy");
    });
});

Route::controller(ArtikelController::class)->group(function (){
   Route::get("/", "show");
   Route::get("/member", "anggota");
   Route::get("/artikel/{id}", "detail");
});

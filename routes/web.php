<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::resource('/user', UserDataController::class);
Route::resource('/auth', UserController::class);
Route::resource('/informasi', InformasiController::class);
Route::resource('/travel', TravelController::class);
Route::resource('/berita', BeritaController::class);
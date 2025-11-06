<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDataController;
use App\Models\Berita;
use App\Models\Informasi;
use App\Models\Travel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $informasis = Informasi::with('klasifikasis.masterKlasifikasi', 'gambars')->limit(5)->get();
    $beritas = Berita::with('klasifikasis.masterKlasifikasi', 'gambars')->limit(5)->get();
    $travels = Travel::with('klasifikasis.masterKlasifikasi', 'gambars', 'kota')->limit(5)->get();

    return view('beranda', [
        'informasis' => $informasis,
        'beritas' => $beritas,
        'travels' => $travels,
    ]);
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/storage/image/{filename}', function ($filename) {
    $path = storage_path('app/private/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('storage.image');


Route::resource('/user', UserDataController::class);
Route::resource('/auth', UserController::class);
Route::resource('/informasi', InformasiController::class);
Route::resource('/berita', BeritaController::class);
Route::resource('/travel', TravelController::class);
Route::post('/travel/lapor/{travel}', [TravelController::class, 'lapor']);
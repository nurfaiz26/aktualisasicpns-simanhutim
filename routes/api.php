<?php

use App\Http\Controllers\api\BeritaController;
use App\Http\Controllers\api\InformasiController;
use App\Http\Controllers\api\TravelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// route api for search and filter travel
Route::get('/travel/search', [TravelController::class, 'search']);

// route api for search and filter berita
Route::get('/berita/search', [BeritaController::class, 'search']);

// route api for search and filter info
Route::get('/informasi/search', [InformasiController::class, 'search']);
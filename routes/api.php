<?php

use App\Http\Controllers\api\TravelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// route api for search and filter travel on beranda
Route::get('/travel/search', [TravelController::class, 'search']);

// route api for search and filter travel

// route api for search and filter berita

// route api for search and filter info
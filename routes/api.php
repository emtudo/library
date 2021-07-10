<?php

use App\Http\Controllers\AuthorIndexController;
use App\Http\Controllers\AuthorStoreController;
use App\Http\Controllers\BookStoreController;
use App\Http\Controllers\LibraryDestroyController;
use App\Http\Controllers\LibraryIndexController;
use App\Http\Controllers\LibraryStoreController;
use Illuminate\Support\Facades\Route;

Route::post('/authors', AuthorStoreController::class);
Route::get('/authors', AuthorIndexController::class);

Route::post('/books', BookStoreController::class);
Route::post('/libraries', LibraryStoreController::class);

Route::get('/libraries', LibraryIndexController::class);
Route::delete('/libraries/{library}', LibraryDestroyController::class);

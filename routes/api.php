<?php

use App\Http\Controllers\AuthorStoreController;
use App\Http\Controllers\BookStoreController;
use App\Http\Controllers\BookStoreFromISBNController;
use App\Http\Controllers\LibraryStoreController;
use Illuminate\Support\Facades\Route;

Route::post('/authors', AuthorStoreController::class);
Route::post('/books', BookStoreController::class);
Route::post('/libraries', LibraryStoreController::class);

<?php

use App\Http\Controllers\AuthorStoreController;
use App\Http\Controllers\BookStoreController;
use App\Http\Controllers\BookStoreFromISBNController;
use Illuminate\Support\Facades\Route;

Route::post('/authors', AuthorStoreController::class);
Route::post('/books', BookStoreController::class);
Route::post('/books_from_isbn/{isbn}', BookStoreFromISBNController::class);

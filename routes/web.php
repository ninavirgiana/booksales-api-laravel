<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\BooksController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/authors', [AuthorsController::class, 'index']);
Route::get('/genres', [GenresController::class, 'index']);
Route::get('/books', [BooksController::class, 'index']);


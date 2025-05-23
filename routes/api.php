<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\BooksController;

// Route::get('/authors', [AuthorsController::class, 'index']);
// Route::post('/authors', [AuthorsController::class, 'store']);
// Route::put('/authors/{id}', [AuthorsController::class, 'update']);
// Route::delete('/authors/{id}', [AuthorsController::class, 'destroy']);

// Route::get('/genres', [GenresController::class, 'index']);
// Route::post('/genres', [GenresController::class, 'store']);
// Route::put('/genres/{id}', [GenresController::class, 'update']);
// Route::delete('/genres/{id}', [GenresController::class, 'destroy']); 

Route::apiResource('authors', AuthorsController::class);
Route::apiResource('genres', GenresController::class);

Route::get('/books', [BooksController::class, 'index']);
Route::post('/books', [BooksController::class, 'store']);
Route::put('/books/{id}', [BooksController::class, 'update']);
Route::delete('/books/{id}', [BooksController::class, 'destroy']);

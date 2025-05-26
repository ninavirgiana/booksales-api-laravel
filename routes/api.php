<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', action: [AuthController::class, 'login']);
Route::post('/logout', action: [AuthController::class, 'logout'])->middleware('auth:api');

Route::get('/authors', [AuthorsController::class, 'index']); // Public access
Route::get('/authors/{id}', [AuthorsController::class, 'show']); // Public access

Route::middleware(['auth:api'])->group(function () {
    Route::post('/authors', [AuthorsController::class, 'store']);
    Route::put('/authors/{id}', [AuthorsController::class, 'update']);
    Route::delete('/authors/{id}', [AuthorsController::class, 'destroy']);
});

Route::get('/genres', [GenresController::class, 'index']); // Public access
Route::get('/genres/{id}', [GenresController::class, 'show']); // Public access

Route::middleware(['auth:api'])->group(function () {
    Route::post('/genres', [GenresController::class, 'store']);
    Route::put('/genres/{id}', [GenresController::class, 'update']);
    Route::delete('/genres/{id}', [GenresController::class, 'destroy']);
});

Route::get('/books', [BooksController::class, 'index']); // Public access
Route::get('/books/{id}', [BooksController::class, 'show']); // Public access

Route::middleware(['auth:api'])->group(function () {
    Route::post('/books', [BooksController::class, 'store']);
    Route::put('/books/{id}', [BooksController::class, 'update']);
    Route::delete('/books/{id}', [BooksController::class, 'destroy']);
});
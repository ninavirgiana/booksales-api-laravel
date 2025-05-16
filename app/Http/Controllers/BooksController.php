<?php

namespace App\Http\Controllers;

use App\Models\Books;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::with('author', 'genre')->get();
        return view('books', compact('books')); 
    }
}
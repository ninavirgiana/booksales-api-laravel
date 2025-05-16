<?php

namespace App\Http\Controllers;

use App\Models\Genres; 

class GenresController extends Controller
{
    public function index()
    {
        $genres = Genres::all();
        return view('genres', compact('genres')); 
    }
}
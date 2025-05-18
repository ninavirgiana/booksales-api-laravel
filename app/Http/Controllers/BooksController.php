<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(): JsonResponse
    {
        $books = Books::with('author', 'genre')->get();
        return response()->json([
            'success' => true,
            'data' => $books
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $book = Books::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $book
        ], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $book = Books::findOrFail($id);
        $book->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $book
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $book = Books::findOrFail($id);
        $book->delete();
        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully'
        ]);
    }
}

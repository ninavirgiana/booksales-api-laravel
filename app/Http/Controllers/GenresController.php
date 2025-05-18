<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index(): JsonResponse
    {
        $genres = Genres::all();
        return response()->json([
            'success' => true,
            'data' => $genres
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genres::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $genre
        ], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $genre = Genres::findOrFail($id);
        $genre->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $genre
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $genre = Genres::findOrFail($id);
        $genre->delete();
        return response()->json([
            'success' => true,
            'message' => 'Genre deleted successfully'
        ]);
    }
}

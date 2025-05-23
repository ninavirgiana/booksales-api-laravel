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
        
        if ($genres->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No genres found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $genres
        ]);
    }

    public function show($id): JsonResponse
    {
        $genre = Genres::find($id);
        
        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Genre not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $genre
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
        $genre = Genres::find($id);
        
        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Genre not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $genre
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $genre = Genres::find($id);
        
        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Genre not found'
            ], 404);
        }

        $genre->delete();
        return response()->json([
            'success' => true,
            'message' => 'Genre deleted successfully'
        ]);
    }
}
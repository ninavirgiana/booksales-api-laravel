<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index(): JsonResponse
    {
        $authors = Authors::all();
        
        if ($authors->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No authors found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $authors
        ]);
    }

    public function show($id): JsonResponse
    {
        $author = Authors::find($id);
        
        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $author
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Authors::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $author
        ], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $author = Authors::find($id);
        
        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $author
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $author = Authors::find($id);
        
        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found'
            ], 404);
        }

        $author->delete();
        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully'
        ]);
    }
}
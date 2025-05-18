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
        return response()->json([
            'success' => true,
            'data' => $authors
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
        $author = Authors::findOrFail($id);
        $author->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $author
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $author = Authors::findOrFail($id);
        $author->delete();
        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully'
        ]);
    }
}

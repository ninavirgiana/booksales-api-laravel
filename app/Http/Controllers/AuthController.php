<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. Setup validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
        ]);

        // 2. Cek validator
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        // 3. Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 4. Cek keberhasilan
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Registration successful',
                'data' => $user
            ], 201);
        }

        // 5. Cek gagal
        return response()->json([
            'success' => false,
            'message' => 'Registration failed'
        ], 500);
    }
       public function login(Request $request)
{
    // 1. Setup validator
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // 2. Cek validator
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $validator->errors()
        ], 422);
    }

    // 3. Get kredensial dari request
    $credentials = $request->only('email', 'password');

    // 4. Cek isFailed
    if (!$token = auth()->guard('api')->attempt($credentials)) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials'
        ], 401);
    }

    // 5. Cek isSuccess
    return response()->json([
        'success' => true,
        'message' => 'Login successful',
        'user' => auth()->guard('api')->user(),
        'token' => $token,
    ], 200);
}
public function logout(Request $request)
{
    try {
        $user = $request->user();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ], 401);
        }

        $user->tokens()->delete();
        

        return response()->json([
            'success' => true,
            'message' => 'Logout successful'
        ], 200);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Logout failed',
            'error' => $e->getMessage()
        ], 500);
    }
}
}
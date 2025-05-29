<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

            foreach ($roles as $role) {
                if (!in_array($role, ['admin', 'customer'])) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid role specified'
                    ], 400);
                }
            }

            if (!in_array($user->role, $roles)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized. Required role: '.implode(' or ', $roles)
                ], 403);
            }

            return $next($request);
            
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated - Invalid or expired token'
            ], 401);
        }
    }
}
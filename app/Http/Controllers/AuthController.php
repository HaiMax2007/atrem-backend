<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController
{
    public function login(Request $request)
    {
        $adminCredentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $adminCredentials['email'])->where('role', 'admin')->first();

        if (!$user || $user->password !== $request->password) {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid credentials or not authorized'
            ], 401);
        }

        $token = $user->createToken($user->full_name)->plainTextToken;

        return response()->json([
            'status' => 200,
            'message' => 'Login successful',
            'token' => $token
        ], 200);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => 200,
            'message' => 'You are logout'
        ], 200);
    }
}

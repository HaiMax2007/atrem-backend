<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\User;
use Illuminate\Http\Request;

class UserController implements HasMiddleware
{
    public static function middleware(){
        return [
            new Middleware('auth:sanctum')
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Getting users successful',
            'users' => User::users()->get()
        ], 200);  
    }

    public function indexTrainer()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Getting trainers successful',
            'users' => User::trainers()->get(),
        ], 200);  
    }

    public function indexAdmin()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Getting user successful',
            'users' => User::admins()->get(),
        ], 200);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

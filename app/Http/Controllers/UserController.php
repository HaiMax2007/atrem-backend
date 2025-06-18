<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    // public static function middleware(){
    //     return [
    //         new Middleware('auth:sanctum')
    //     ];
    // }

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
            'trainers' => User::trainers()->get(),
        ], 200);  
    }

    public function indexAdmin()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Getting user successful',
            'admins' => User::admins()->get(),
        ], 200);  
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();

        return response()->json([
            'status' => 200,
            'message' => 'Getting user successfully',
            'user' => $user
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $validatedData = $request->validate([
            'full_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'phone' => 'sometimes|string|max:20',
            'age' => 'sometimes|integer',
        ]);

        $user->update($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'User updated successfully',
            'user' => $user
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return response()->json([
            'status' => 200,
            'message' => 'User deleted successfully'
        ], 200);
    }
}

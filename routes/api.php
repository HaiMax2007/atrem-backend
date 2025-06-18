<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/users', [UserController::class, 'index']);
Route::get('/admins', [UserController::class, 'indexAdmin']);
Route::get('/trainers', [UserController::class, 'indexTrainer']);

Route::post('/users/register-package', [PackageController::class, 'registerPackage']);
Route::post('/users/{id}/admin-approve-membership', [PackageController::class, 'adminApproveMembership']);
Route::post('/users/{id}/admin-approve-pt', [PackageController::class, 'adminApprovePT']);
Route::post('/users/login', [AuthController::class, 'login']);
Route::post('/users/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
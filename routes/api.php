<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserTrainerController;
use App\Http\Controllers\UserMembershipController;
use App\Http\Controllers\TrainerPackageController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PaymentLogsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/admins', [UserController::class, 'indexAdmin']);
Route::get('/trainers', [UserController::class, 'indexTrainer']);
Route::get('/memberships', [MembershipController::class, 'index']);
Route::get('/sessions', [TrainerPackageController::class, 'index']);
Route::get('/user-trainers', [UserTrainerController::class, 'index']);
Route::get('/user-memberships', [UserMembershipController::class, 'index']);

Route::post('/users/register-package', [PackageController::class, 'registerPackage']);
Route::post('/users/{id}/admin-approve-membership', [PackageController::class, 'adminApproveMembership']);
Route::post('/users/{id}/admin-approve-pt', [PackageController::class, 'adminApprovePT']);
Route::post('/users/login', [AuthController::class, 'login']);
Route::post('/users/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::put('/users/{id}', [UserController::class, 'update']);

Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/payments', [PaymentLogsController::class, 'index']);
Route::get('/payments/{id}', [PaymentLogsController::class, 'show']);
Route::post('/payments/{id}', [PaymentLogsController::class, 'uploadProof']);
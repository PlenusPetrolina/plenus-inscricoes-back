<?php

use App\Http\Controllers\{AuthController,UserController, AdminController};
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('login-admin', [AuthController::class, 'loginAdmin']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::prefix('user')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class, 'userLogged']);
});
Route::post('user', [UserController::class, 'store']);
Route::post('admin', [AdminController::class, 'store']);


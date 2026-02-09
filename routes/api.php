<?php

use App\Http\Controllers\{AuthController,UserController, AdminController, EventoController, InscricaoController, SegmentoController, AlunoController };
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('login-admin', [AuthController::class, 'loginAdmin']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::prefix('user')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class, 'userLogged']);
});
Route::post('user', [UserController::class, 'store']);
Route::get('responsavel/{cpf}', [UserController::class, 'searchByCpf']);
Route::post('admin', [AdminController::class, 'store']);

Route::get('eventos', [EventoController::class, 'index']);
Route::post('evento', [EventoController::class, 'store']);
Route::get('evento/{id}', [EventoController::class, 'show']);
Route::put('evento/{id}', [EventoController::class, 'update']);

Route::get('inscricoes', [InscricaoController::class, 'index']);
Route::post('inscricao', [InscricaoController::class, 'store']);
Route::get('inscricao/{id}', [InscricaoController::class, 'show']);
Route::put('inscricao/{id}', [InscricaoController::class, 'update']);
Route::prefix('segmentos')->group(function () {
    Route::get('/', [SegmentoController::class, 'index']);
});
Route::post('/alunos/import', [AlunoController::class, 'import']);
Route::get('/alunos', [AlunoController::class,'index']);



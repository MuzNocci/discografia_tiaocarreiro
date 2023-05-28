<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::middleware('auth:sanctum')->get('/dashboard', [EventController::class, 'dashboard']);
Route::middleware('auth:sanctum')->get('/dashboard/adicionar/musica/', [EventController::class, 'adicionar_music']);
Route::middleware('auth:sanctum')->post('/dashboard/adicionar/musica/', [EventController::class, 'register_music']);
Route::middleware('auth:sanctum')->get('/dashboard/editar/musica/{id}', [EventController::class, 'editar_music']);
Route::middleware('auth:sanctum')->put('/dashboard/editar/musica/{id}', [EventController::class, 'update_music']);
Route::middleware('auth:sanctum')->get('/dashboard/excluir/musica/{id}', [EventController::class, 'deletar_music']);
Route::middleware('auth:sanctum')->delete('/dashboard/excluir/musica/{id}', [EventController::class, 'destroy_music']);
Route::middleware('auth:sanctum')->get('/dashboard/adicionar/album/', [EventController::class, 'adicionar_album']);
Route::middleware('auth:sanctum')->post('/dashboard/adicionar/album/', [EventController::class, 'register_album']);
Route::middleware('auth:sanctum')->get('/dashboard/editar/album/{id}', [EventController::class, 'editar_album']);
Route::middleware('auth:sanctum')->put('/dashboard/editar/album/{id}', [EventController::class, 'update_album']);
Route::middleware('auth:sanctum')->get('/dashboard/excluir/album/{id}', [EventController::class, 'deletar_album']);
Route::middleware('auth:sanctum')->delete('/dashboard/excluir/album/{id}', [EventController::class, 'destroy_album']);
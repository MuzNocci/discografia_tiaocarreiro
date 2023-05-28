<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::middleware('auth:sanctum')->get('/dashboard', [EventController::class, 'dashboard']);
Route::middleware('auth:sanctum')->get('/dashboard/adicionar/musica/', [EventController::class, 'add_music']);
Route::middleware('auth:sanctum')->post('/dashboard/adicionar/musica/', [EventController::class, 'register_music']);
Route::middleware('auth:sanctum')->get('/dashboard/editar/musica/{id}', [EventController::class, 'edit_music']);
Route::middleware('auth:sanctum')->get('/dashboard/excluir/musica/{id}', [EventController::class, 'del_music']);
Route::middleware('auth:sanctum')->get('/dashboard/adicionar/album/', [EventController::class, 'add_album']);
Route::middleware('auth:sanctum')->post('/dashboard/adicionar/album/', [EventController::class, 'register_album']);
Route::middleware('auth:sanctum')->get('/dashboard/editar/album/{id}', [EventController::class, 'edit_album']);
Route::middleware('auth:sanctum')->get('/dashboard/excluir/album/{id}', [EventController::class, 'del_album']);
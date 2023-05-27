<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::get('/admin/login', [EventController::class, 'login']);
Route::get('/admin/dashboard', [EventController::class, 'dashboard']);
Route::get('/admin/editar/musica/{id}', [EventController::class, 'edit_music']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

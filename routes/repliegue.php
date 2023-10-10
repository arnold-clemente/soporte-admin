<?php

use App\Http\Controllers\RepliegueComponenteController;
use App\Http\Controllers\RepliegueController;
use App\Http\Controllers\RepliegueDispositivoController;
use App\Http\Controllers\RepliegueEquipoController;
use Illuminate\Support\Facades\Route;

// repliegue 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/repliegues', [RepliegueController::class, 'index'])
    ->name('repliegues.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/repliegue/create', [RepliegueController::class, 'create'])
    ->name('repliegue.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/repliegue/store', [RepliegueController::class, 'store'])
    ->name('repliegue.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/repliegue/{repliegue}/edit', [RepliegueController::class, 'edit'])
    ->name('repliegue.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->put('/repliegue/{repliegue}', [RepliegueController::class, 'update'])
    ->name('repliegue.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->delete('/repliegue/{repliegue}', [RepliegueController::class, 'destroy'])
    ->name('repliegue.destroy');

// /almacen equipos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/repliegue/equipo/store', [RepliegueEquipoController::class, 'store'])
    ->name('repliegue.equipo.store');

// /almacen dispositivos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/repliegue/dispositivo/store', [RepliegueDispositivoController::class, 'store'])
    ->name('repliegue.dispositivo.store');

// /almacen componente 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/repliegue/componente/store', [RepliegueComponenteController::class, 'store'])
    ->name('repliegue.componente.store');

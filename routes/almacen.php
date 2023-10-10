<?php

use App\Http\Controllers\AlmacenComponenteController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\AlmacenDispositivoController;
use App\Http\Controllers\AlmacenEquipoController;
use Illuminate\Support\Facades\Route;

// almacen 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/almacenes', [AlmacenController::class, 'index'])
    ->name('almacenes.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/almacen/create', [AlmacenController::class, 'create'])
    ->name('almacen.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/almacen/store', [AlmacenController::class, 'store'])
    ->name('almacen.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/almacen/{almacen}/edit', [AlmacenController::class, 'edit'])
    ->name('almacen.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->put('/almacen/{almacen}', [AlmacenController::class, 'update'])
    ->name('almacen.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->delete('/almacen/{almacen}', [AlmacenController::class, 'destroy'])
    ->name('almacen.destroy');

// /almacen equipos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/almacen/equipo/store', [AlmacenEquipoController::class, 'store'])
    ->name('almacen.equipo.store');

// /almacen dispositivos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/almacen/dispositivo/store', [AlmacenDispositivoController::class, 'store'])
    ->name('almacen.dispositivo.store');

// /almacen componente 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/almacen/componente/store', [AlmacenComponenteController::class, 'store'])
    ->name('almacen.componente.store');

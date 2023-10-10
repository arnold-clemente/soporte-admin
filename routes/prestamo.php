<?php

use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\PrestamoDispositivoController;
use App\Http\Controllers\PrestamoEquipoController;
use Illuminate\Support\Facades\Route;


// prestamos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/prestamos', [PrestamoController::class, 'index'])
    ->name('prestamos.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/prestamo/create', [PrestamoController::class, 'create'])
    ->name('prestamo.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/prestamo/store', [PrestamoController::class, 'store'])
    ->name('prestamo.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/prestamo/{prestamo}/edit', [PrestamoController::class, 'edit'])
    ->name('prestamo.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->put('/prestamo/{prestamo}', [PrestamoController::class, 'update'])
    ->name('prestamo.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->delete('/prestamo/{prestamo}', [PrestamoController::class, 'destroy'])
    ->name('prestamo.destroy');

// /almacen equipos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/prestamo/equipo/store', [PrestamoEquipoController::class, 'store'])
    ->name('prestamo.equipo.store');

// /almacen dispositivos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/prestamo/dispositivo/store', [PrestamoDispositivoController::class, 'store'])
    ->name('prestamo.dispositivo.store');

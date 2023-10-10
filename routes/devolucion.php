<?php

use App\Http\Controllers\DevolucionController;
use App\Http\Controllers\DevolucionDispositivoController;
use App\Http\Controllers\DevolucionEquipoController;
use Illuminate\Support\Facades\Route;

// devolucion 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/devolucions', [DevolucionController::class, 'index'])
->name('devolucions.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/devolucion/create', [DevolucionController::class, 'create'])
    ->name('devolucion.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/devolucion/store', [DevolucionController::class, 'store'])
    ->name('devolucion.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/devolucion/{devolucion}/edit', [DevolucionController::class, 'edit'])
    ->name('devolucion.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->put('/devolucion/{devolucion}', [DevolucionController::class, 'update'])
    ->name('devolucion.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->delete('/devolucion/{devolucion}', [DevolucionController::class, 'destroy'])
    ->name('devolucion.destroy');

// /almacen equipos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/devolucion/equipo/store', [DevolucionEquipoController::class, 'store'])
    ->name('devolucion.equipo.store');

// /almacen dispositivos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/devolucion/dispositivo/store', [DevolucionDispositivoController::class, 'store'])
    ->name('devolucion.dispositivo.store');
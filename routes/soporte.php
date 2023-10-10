<?php

use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\SoporteDispositivoController;
use App\Http\Controllers\SoporteEquipoController;
use Illuminate\Support\Facades\Route;


// soporte 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/soportes', [SoporteController::class, 'index'])
    ->name('soportes.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/soporte/{soporte}/create', [SoporteController::class, 'create'])
    ->name('soporte.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/soporte/{soporte}/edit', [SoporteController::class, 'edit'])
    ->name('soporte.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->put('/soporte/update', [SoporteController::class, 'update'])
    ->name('soporte.update');

// solicitud 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/solicitudes', [SolicitudController::class, 'index'])
    ->name('solicitudes.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/solicitud/create', [SolicitudController::class, 'create'])
    ->name('solicitud.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/solicitud/store', [SolicitudController::class, 'store'])
    ->name('solicitud.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->get('/solicitud/{soporte}/edit', [SolicitudController::class, 'edit'])
    ->name('solicitud.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->put('/solicitud/update', [SolicitudController::class, 'update'])
    ->name('solicitud.update');

// /solicitud equipos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/solicitud/equipo/store', [SoporteEquipoController::class, 'store'])
    ->name('solicitud.equipo.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->put('/solicitud/equipo/update', [SoporteEquipoController::class, 'update'])
    ->name('solicitud.equipo.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->delete('/solicitud/equipo/{soporteEquipo}', [SoporteEquipoController::class, 'destroy'])
    ->name('solicitud.equipo.destroy');

//cambiar estado de equipos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/equipo/soporte', [EquipoController::class, 'soporte'])
    ->name('equipo.soporte');

// /solicitud dispositivos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/solicitud/dispositivo/store', [SoporteDispositivoController::class, 'store'])
    ->name('solicitud.dispositivo.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->put('/solicitud/dispositivo/update', [SoporteDispositivoController::class, 'update'])
    ->name('solicitud.dispositivo.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->delete('/solicitud/dispositivo/{soporteDispositivo}', [SoporteDispositivoController::class, 'destroy'])
    ->name('solicitud.dispositivo.destroy');

//cambiar estado de dispositivos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->post('/dispositivo/soporte', [DispositivoController::class, 'soporte'])
    ->name('dispositivo.soporte');


    // pdf 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/solicitud/reporte/{soporte}', [SolicitudController::class, 'solicitud'])
->name('solicitud.solicitud');
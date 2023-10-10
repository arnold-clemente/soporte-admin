<?php

use App\Http\Controllers\EntregaArticuloController;
use App\Http\Controllers\EntregaComponenteController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EntregaController;
use App\Http\Controllers\EntregaDispositivoController;
use App\Http\Controllers\EntregaEquipoController;

// entrega 

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/entregas', [EntregaController::class, 'index'])
->name('entregas.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/entrega/create', [EntregaController::class, 'create'])
->name('entrega.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/entrega/store', [EntregaController::class, 'store'])
->name('entrega.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/entrega/{entrega}/edit', [EntregaController::class, 'edit'])
->name('entrega.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/entrega/{entrega}', [EntregaController::class, 'update'])
->name('entrega.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/entrega/{entrega}', [EntregaController::class, 'destroy'])
->name('entrega.destroy');

// /entrega equipos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/entrega/equipo/store', [EntregaEquipoController::class, 'store'])
->name('entrega.equipo.store');

// /entrega dispositivos 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/entrega/dispositivo/store', [EntregaDispositivoController::class, 'store'])
->name('entrega.dispositivo.store');

// /entrega articulo 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/entrega/articulo/store', [EntregaArticuloController::class, 'store'])
->name('entrega.articulo.store');

// /entrega componente 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/entrega/componente/store', [EntregaComponenteController::class, 'store'])
->name('entrega.componente.store');

// pdf 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/entrega/reporte/{entrega}', [EntregaController::class, 'entrega'])
->name('entrega.reporte');

<?php

use App\Http\Controllers\IngresoArticuloController;
use App\Http\Controllers\IngresoController;
use Illuminate\Support\Facades\Route;

// ingreso 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/ingresos', [IngresoController::class, 'index'])
->name('ingresos.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/ingreso/create', [IngresoController::class, 'create'])
->name('ingreso.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/ingreso/store', [IngresoController::class, 'store'])
->name('ingreso.store');


// /entrega articulo 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/ingreso/articulo/store', [IngresoArticuloController::class, 'store'])
->name('ingreso.articulo.store');

// pdf 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/ingreso/reporte/{ingreso}', [IngresoController::class, 'ingreso'])
->name('ingreso.reporte');
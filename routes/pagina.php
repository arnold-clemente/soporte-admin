<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// pagina principal 
Route::get('/', function () {
    return Inertia::render('Index');
})->name('pagina.index');

Route::get('/nosotros', function () {
    return Inertia::render('NosotrosPage');
})->name('pagina.nosotros');

Route::get('/infraestructura', function () {
    return Inertia::render('InfraestructuraPage');
})->name('pagina.infraestructura');

Route::get('/soporte-tecnico', function () {
    return Inertia::render('SoporteTecnicoPage');
})->name('pagina.soporte.tecnico');

Route::get('/desarrollo', function () {
    return Inertia::render('DesarrolloPage');
})->name('pagina.desarrollo');

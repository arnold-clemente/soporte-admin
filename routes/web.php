<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComponenteController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// rutas para usuarios
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/usuarios', [UserController::class, 'index'])
->name('usuarios.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/usuario/create', [UserController::class, 'create'])
->name('usuario.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/usuario/store', [UserController::class, 'store'])
->name('usuario.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/usuario/{user}/edit', [UserController::class, 'edit'])
->name('usuario.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/usuario/{user}', [UserController::class, 'update'])
->name('usuario.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/user/{user}', [UserController::class, 'password'])
->name('usuario.password');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/usuario/{user}', [UserController::class, 'destroy'])
->name('usuario.destroy');

// Tecnicos
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/tecnicos', [TecnicoController::class, 'index'])
->name('tecnicos.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/tecnico/create', [TecnicoController::class, 'create'])
->name('tecnico.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/tecnico/store', [TecnicoController::class, 'store'])
->name('tecnico.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/tecnico/{tecnico}/edit', [TecnicoController::class, 'edit'])
->name('tecnico.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/tecnico/{tecnico}', [TecnicoController::class, 'update'])
->name('tecnico.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/tecnico/{tecnico}', [TecnicoController::class, 'destroy'])
->name('tecnico.destroy');


// Funcionarios
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/funcionarios', [FuncionarioController::class, 'index'])
->name('funcionarios.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/funcionarios/create', [FuncionarioController::class, 'create'])
->name('funcionario.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/funcionarios/store', [FuncionarioController::class, 'store'])
->name('funcionario.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/funcionarios/{funcionario}/edit', [FuncionarioController::class, 'edit'])
->name('funcionario.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/funcionarios/{funcionario}', [FuncionarioController::class, 'update'])
->name('funcionario.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/funcionarios/{funcionario}', [FuncionarioController::class, 'password'])
->name('funcionario.password');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/funcionarios/{funcionario}', [FuncionarioController::class, 'destroy'])
->name('funcionario.destroy');


// Equipos

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/equipos', [EquipoController::class, 'index'])
->name('equipos.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/equipo/create', [EquipoController::class, 'create'])
->name('equipo.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/equipo/store', [EquipoController::class, 'store'])
->name('equipo.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/equipo/{equipo}/edit', [EquipoController::class, 'edit'])
->name('equipo.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/equipo/{equipo}', [EquipoController::class, 'update'])
->name('equipo.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/equipo/{equipo}', [EquipoController::class, 'destroy'])
->name('equipo.destroy');

// Componentes

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/componente/store', [ComponenteController::class, 'store'])
->name('componente.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/componente/{componente}', [ComponenteController::class, 'update'])
->name('componente.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/componente/{componente}', [ComponenteController::class, 'destroy'])
->name('componente.destroy');

// Dispositivos

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/dispositivos', [DispositivoController::class, 'index'])
->name('dispositivos.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/dispositivo/create', [DispositivoController::class, 'create'])
->name('dispositivo.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/dispositivo/store', [DispositivoController::class, 'store'])
->name('dispositivo.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/dispositivo/{dispositivo}/edit', [DispositivoController::class, 'edit'])
->name('dispositivo.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/dispositivo/{dispositivo}', [DispositivoController::class, 'update'])
->name('dispositivo.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/dispositivo/{dispositivo}', [DispositivoController::class, 'destroy'])
->name('dispositivo.destroy');

// Unidad

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/unidades', [UnidadController::class, 'index'])
->name('unidades.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/unidad/create', [UnidadController::class, 'create'])
->name('unidad.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/unidad/store', [UnidadController::class, 'store'])
->name('unidad.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/unidad/{unidad}/edit', [UnidadController::class, 'edit'])
->name('unidad.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/unidad/{unidad}', [UnidadController::class, 'update'])
->name('unidad.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/unidad/{unidad}', [UnidadController::class, 'destroy'])
->name('unidad.destroy');


// Informes

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/informes', [InformeController::class, 'index'])
->name('informes.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/informe/create', [InformeController::class, 'create'])
->name('informe.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/informe/store', [InformeController::class, 'store'])
->name('informe.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/informe/{informe}/edit', [InformeController::class, 'edit'])
->name('informe.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/informe/{informe}', [InformeController::class, 'update'])
->name('informe.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/informe/{informe}', [InformeController::class, 'destroy'])
->name('informe.destroy');

// Notas

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/notas', [NotaController::class, 'index'])
->name('notas.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/nota/create', [NotaController::class, 'create'])
->name('nota.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/nota/store', [NotaController::class, 'store'])
->name('nota.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/nota/{nota}/edit', [NotaController::class, 'edit'])
->name('nota.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/nota/{nota}', [NotaController::class, 'update'])
->name('nota.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/nota/{nota}', [NotaController::class, 'destroy'])
->name('nota.destroy');

// categorias 

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/categorias', [CategoriaController::class, 'index'])
->name('categorias.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/categoria/create', [CategoriaController::class, 'create'])
->name('categoria.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/categoria/store', [CategoriaController::class, 'store'])
->name('categoria.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/categoria/{categoria}/edit', [CategoriaController::class, 'edit'])
->name('categoria.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/categoria/{categoria}', [CategoriaController::class, 'update'])
->name('categoria.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/categoria/{categoria}', [CategoriaController::class, 'destroy'])
->name('categoria.destroy');

// articulos 

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/articulos', [ArticuloController::class, 'index'])
->name('articulos.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/articulo/create', [ArticuloController::class, 'create'])
->name('articulo.create');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->post('/articulo/store', [ArticuloController::class, 'store'])
->name('articulo.store');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->get('/articulo/{articulo}/edit', [ArticuloController::class, 'edit'])
->name('articulo.edit');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->put('/articulo/{articulo}', [ArticuloController::class, 'update'])
->name('articulo.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
->delete('/articulo/{articulo}', [ArticuloController::class, 'destroy'])
->name('articulo.destroy');
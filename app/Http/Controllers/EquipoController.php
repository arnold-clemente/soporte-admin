<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Http\Requests\StoreEquipoRequest;
use App\Http\Requests\UpdateEquipoRequest;
use App\Models\Categoria;
use App\Models\Componente;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $equipos = Equipo::with('tecnico')->get();
        return Inertia::render('equipo/Index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        $categorias = Categoria::where('activo', 1)->get();
        return Inertia::render('equipo/Create', compact('fecha', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEquipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $tecnico = Tecnico::where('user_id', $user_id)->first()->id;
        $request->validate([
            'codigo' => 'required|string|max:255|unique:equipos,codigo',
            'procesador' => 'required|string|max:255',
            'placa' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
        ]);
       $equipo = Equipo::create([
            'codigo' => $request->codigo,
            'fecha' => $request->fecha,
            'procesador' => $request->procesador,
            'placa' => $request->placa,
            'estado' => "1",
            'descripcion' => $request->descripcion,
            'tecnico_id' => $tecnico,
        ]);

        return response($equipo->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        $equipos = Equipo::with('componentes')->find($equipo->id);
        $categorias = Categoria::where('activo', 1)->get();
        return Inertia::render('equipo/Edit', compact('equipos', 'fecha', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquipoRequest  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        $data = $request->validate([
            'codigo' => 'required|string|max:255|unique:equipos,codigo,' .  $equipo->id,
            'procesador' => 'required|string|max:255',
            'placa' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
        ]);
        $equipo->update($data);
        return response('actualizado con exito');
    }

    public function soporte(Request $request)
    {
       $equipo = Equipo::find($request->id);
       $equipo->entrega = $request->entrega;
       $equipo->reparacion = $request->reparacion;
       $equipo->prestamo = $request->prestamo;
       $equipo->devolucion = $request->devolucion;
       $equipo->repliegue = $request->repliegue;
       $equipo->estado = $request->estado;
       $equipo->save();

        return response($equipo->reparacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return response('Eliminado');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Http\Requests\StoreDispositivoRequest;
use App\Http\Requests\UpdateDispositivoRequest;
use App\Models\Categoria;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispositivos = Dispositivo::with('tecnico')->get();
        return Inertia::render('dispositivo/Index', compact('dispositivos'));
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
        return Inertia::render('dispositivo/Create', compact('fecha',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDispositivoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $tecnico = Tecnico::where('user_id', $user_id)->first()->id;

        $request->validate([
            'codigo' => 'required|string|max:255|unique:dispositivos,codigo',
            'nombre' => 'required|string|max:255',
            'tamano' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
        ]);
        $dispositivo = Dispositivo::create([
            'codigo' => $request->codigo,
            'fecha' => $request->fecha,
            'nombre' => $request->nombre,
            'tamano' => $request->tamano,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'estado' => "1",
            'descripcion' => $request->descripcion,
            'tecnico_id' => $tecnico,
        ]);
        return response($dispositivo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function show(Dispositivo $dispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Dispositivo $dispositivo)
    {
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        return Inertia::render('dispositivo/Edit', compact('fecha', 'dispositivo',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDispositivoRequest  $request
     * @param  \App\Models\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispositivo $dispositivo)
    {
        $data = $request->validate([
            'codigo' => 'required|string|max:255|unique:dispositivos,codigo,' .  $dispositivo->id,
            'nombre' => 'required|string|max:255',
            'tamano' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
        ]);
        $dispositivo->update($data);
        return response('actualizado con exito');
    }

    public function soporte(Request $request)
    {
        $dispositivo = Dispositivo::find($request->id);
        $dispositivo->entrega = $request->entrega;
        $dispositivo->reparacion = $request->reparacion;
        $dispositivo->prestamo = $request->prestamo;
        $dispositivo->devolucion = $request->devolucion;
        $dispositivo->repliegue = $request->repliegue;
        $dispositivo->estado = $request->estado;
        $dispositivo->save();

        return response($dispositivo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dispositivo $dispositivo)
    {
        $dispositivo->delete();
        return response('Eliminado');
    }
}

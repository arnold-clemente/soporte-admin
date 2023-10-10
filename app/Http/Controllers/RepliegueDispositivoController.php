<?php

namespace App\Http\Controllers;

use App\Models\RepliegueDispositivo;
use App\Http\Requests\StoreRepliegueDispositivoRequest;
use App\Http\Requests\UpdateRepliegueDispositivoRequest;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class RepliegueDispositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRepliegueDispositivoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RepliegueDispositivo::create([
            'repliegue_id' => $request->repliegue_id,
            'dispositivo_id' => $request->dispositivo_id,
            'descripcion' => $request->descripcion,
        ]);
        $dispositivo = Dispositivo::find($request->dispositivo_id);
        $dispositivo->entrega = 0;
        $dispositivo->reparacion = 0;
        $dispositivo->prestamo = 0;
        $dispositivo->devolucion = 0;
        $dispositivo->repliegue = 1;
        $dispositivo->estado = "3";
        $dispositivo->save();
        
        return response($dispositivo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RepliegueDispositivo  $repliegueDispositivo
     * @return \Illuminate\Http\Response
     */
    public function show(RepliegueDispositivo $repliegueDispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RepliegueDispositivo  $repliegueDispositivo
     * @return \Illuminate\Http\Response
     */
    public function edit(RepliegueDispositivo $repliegueDispositivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepliegueDispositivoRequest  $request
     * @param  \App\Models\RepliegueDispositivo  $repliegueDispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepliegueDispositivoRequest $request, RepliegueDispositivo $repliegueDispositivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RepliegueDispositivo  $repliegueDispositivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(RepliegueDispositivo $repliegueDispositivo)
    {
        //
    }
}

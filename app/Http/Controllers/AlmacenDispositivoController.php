<?php

namespace App\Http\Controllers;

use App\Models\AlmacenDispositivo;
use App\Http\Requests\StoreAlmacenDispositivoRequest;
use App\Http\Requests\UpdateAlmacenDispositivoRequest;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class AlmacenDispositivoController extends Controller
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
     * @param  \App\Http\Requests\StoreAlmacenDispositivoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AlmacenDispositivo::create([
            'almacen_id' => $request->almacen_id,
            'dispositivo_id' => $request->dispositivo_id,
            'descripcion' => $request->descripcion,
        ]);
        $dispositivo = Dispositivo::find($request->dispositivo_id);
        $dispositivo->funcionario_id = null;
        $dispositivo->almacen = 1;
        $dispositivo->save();
        
        return response($dispositivo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlmacenDispositivo  $almacenDispositivo
     * @return \Illuminate\Http\Response
     */
    public function show(AlmacenDispositivo $almacenDispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlmacenDispositivo  $almacenDispositivo
     * @return \Illuminate\Http\Response
     */
    public function edit(AlmacenDispositivo $almacenDispositivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlmacenDispositivoRequest  $request
     * @param  \App\Models\AlmacenDispositivo  $almacenDispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlmacenDispositivoRequest $request, AlmacenDispositivo $almacenDispositivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlmacenDispositivo  $almacenDispositivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlmacenDispositivo $almacenDispositivo)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DevolucionDispositivo;
use App\Http\Requests\StoreDevolucionDispositivoRequest;
use App\Http\Requests\UpdateDevolucionDispositivoRequest;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DevolucionDispositivoController extends Controller
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
     * @param  \App\Http\Requests\StoreDevolucionDispositivoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DevolucionDispositivo::create([
            'devolucion_id' => $request->devolucion_id,
            'dispositivo_id' => $request->dispositivo_id,
            'descripcion' => $request->descripcion,
        ]);
        $dispositivo = Dispositivo::find($request->dispositivo_id);
        $dispositivo->funcionario_id = null;
        $dispositivo->entrega = 1;
        $dispositivo->almacen = 1;
        $dispositivo->prestamo = 0;
        $dispositivo->devolucion = 1;
        $dispositivo->save();
        
        return response($dispositivo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DevolucionDispositivo  $devolucionDispositivo
     * @return \Illuminate\Http\Response
     */
    public function show(DevolucionDispositivo $devolucionDispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DevolucionDispositivo  $devolucionDispositivo
     * @return \Illuminate\Http\Response
     */
    public function edit(DevolucionDispositivo $devolucionDispositivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDevolucionDispositivoRequest  $request
     * @param  \App\Models\DevolucionDispositivo  $devolucionDispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDevolucionDispositivoRequest $request, DevolucionDispositivo $devolucionDispositivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DevolucionDispositivo  $devolucionDispositivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DevolucionDispositivo $devolucionDispositivo)
    {
        //
    }
}

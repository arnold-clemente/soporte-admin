<?php

namespace App\Http\Controllers;

use App\Models\SoporteDispositivo;
use App\Http\Requests\StoreSoporteDispositivoRequest;
use App\Http\Requests\UpdateSoporteDispositivoRequest;
use Illuminate\Http\Request;

class SoporteDispositivoController extends Controller
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
     * @param  \App\Http\Requests\StoreSoporteDispositivoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SoporteDispositivo::create([
            'falencia' => $request->falencia,
            'dispositivo_id' => $request->id,
            'soporte_id' => $request->soporte_id,
        ]);
        $soporte = SoporteDispositivo::latest('id')->where('soporte_id', $request->soporte_id)->first()->id;

        return response($soporte);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoporteDispositivo  $soporteDispositivo
     * @return \Illuminate\Http\Response
     */
    public function show(SoporteDispositivo $soporteDispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoporteDispositivo  $soporteDispositivo
     * @return \Illuminate\Http\Response
     */
    public function edit(SoporteDispositivo $soporteDispositivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSoporteDispositivoRequest  $request
     * @param  \App\Models\SoporteDispositivo  $soporteDispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $soporteDispositivo = SoporteDispositivo::find($request->id);
        $soporteDispositivo->falencia = $request->falencia;
        $soporteDispositivo->estado = $request->estado;
        $soporteDispositivo->solucion = $request->solucion;
        $soporteDispositivo->update();

        return response($soporteDispositivo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoporteDispositivo  $soporteDispositivo
     * @return \Illuminate\Http\Response  SoporteDispositivo $soporteDispositivo
     */
    public function destroy(SoporteDispositivo  $soporteDispositivo)
    {
        // $soporteDispositivo = SoporteDispositivo::find($request->id);s
        $soporteDispositivo->delete();
        return response('Eliminado');
    }
}

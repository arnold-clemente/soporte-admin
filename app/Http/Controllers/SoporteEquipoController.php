<?php

namespace App\Http\Controllers;

use App\Models\SoporteEquipo;
use App\Http\Requests\StoreSoporteEquipoRequest;
use App\Http\Requests\UpdateSoporteEquipoRequest;
use Illuminate\Http\Request;

class SoporteEquipoController extends Controller
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
     * @param  \App\Http\Requests\StoreSoporteEquipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SoporteEquipo::create([
            'falencia' => $request->falencia,
            'equipo_id' => $request->id,
            'soporte_id' => $request->soporte_id,
        ]);
        $soporte = SoporteEquipo::latest('id')->where('soporte_id', $request->soporte_id)->first()->id;

        return response($soporte);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoporteEquipo  $soporteEquipo
     * @return \Illuminate\Http\Response
     */
    public function show(SoporteEquipo $soporteEquipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoporteEquipo  $soporteEquipo
     * @return \Illuminate\Http\Response
     */
    public function edit(SoporteEquipo $soporteEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSoporteEquipoRequest  $request
     * @param  \App\Models\SoporteEquipo  $soporteEquipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $soporteEquipo = SoporteEquipo::find($request->id);
        $soporteEquipo->falencia = $request->falencia;
        $soporteEquipo->estado = $request->estado;
        $soporteEquipo->solucion = $request->solucion;
        $soporteEquipo->update();

        return response($soporteEquipo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoporteEquipo  $soporteEquipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoporteEquipo $soporteEquipo, Request $request)
    {
        $soporteEquipo->delete();
        return response('Eliminado');
    }
}

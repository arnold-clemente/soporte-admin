<?php

namespace App\Http\Controllers;

use App\Models\AlmacenComponente;
use App\Http\Requests\StoreAlmacenComponenteRequest;
use App\Http\Requests\UpdateAlmacenComponenteRequest;
use App\Models\Componente;
use Illuminate\Http\Request;

class AlmacenComponenteController extends Controller
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
     * @param  \App\Http\Requests\StoreAlmacenComponenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AlmacenComponente::create([
            'almacen_id' => $request->almacen_id,
            'componente_id' => $request->componente_id,
            'descripcion' => $request->descripcion,
        ]);
        $componente = Componente::find($request->componente_id);
        $componente->almacen = 1;
        $componente->save();
        
        return response($componente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlmacenComponente  $almacenComponente
     * @return \Illuminate\Http\Response
     */
    public function show(AlmacenComponente $almacenComponente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlmacenComponente  $almacenComponente
     * @return \Illuminate\Http\Response
     */
    public function edit(AlmacenComponente $almacenComponente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlmacenComponenteRequest  $request
     * @param  \App\Models\AlmacenComponente  $almacenComponente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlmacenComponenteRequest $request, AlmacenComponente $almacenComponente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlmacenComponente  $almacenComponente
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlmacenComponente $almacenComponente)
    {
        //
    }
}

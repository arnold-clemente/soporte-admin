<?php

namespace App\Http\Controllers;

use App\Models\RepliegueComponente;
use App\Http\Requests\StoreRepliegueComponenteRequest;
use App\Http\Requests\UpdateRepliegueComponenteRequest;
use App\Models\Componente;
use Illuminate\Http\Request;

class RepliegueComponenteController extends Controller
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
     * @param  \App\Http\Requests\StoreRepliegueComponenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RepliegueComponente::create([
            'repliegue_id' => $request->repliegue_id,
            'componente_id' => $request->componente_id,
            'descripcion' => $request->descripcion,
        ]);
        $componente = Componente::find($request->componente_id);
        $componente->almacen = 0;
        $componente->repliegue = 1;
        $componente->save();
        
        return response($componente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RepliegueComponente  $repliegueComponente
     * @return \Illuminate\Http\Response
     */
    public function show(RepliegueComponente $repliegueComponente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RepliegueComponente  $repliegueComponente
     * @return \Illuminate\Http\Response
     */
    public function edit(RepliegueComponente $repliegueComponente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepliegueComponenteRequest  $request
     * @param  \App\Models\RepliegueComponente  $repliegueComponente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepliegueComponenteRequest $request, RepliegueComponente $repliegueComponente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RepliegueComponente  $repliegueComponente
     * @return \Illuminate\Http\Response
     */
    public function destroy(RepliegueComponente $repliegueComponente)
    {
        //
    }
}

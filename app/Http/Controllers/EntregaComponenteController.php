<?php

namespace App\Http\Controllers;

use App\Models\EntregaComponente;
use App\Http\Requests\StoreEntregaComponenteRequest;
use App\Http\Requests\UpdateEntregaComponenteRequest;
use App\Models\Componente;
use Illuminate\Http\Request;

class EntregaComponenteController extends Controller
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
     * @param  \App\Http\Requests\StoreEntregaComponenteRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        EntregaComponente::create([
            'equipo_id' => $request->equipo,
            'entrega_id' => $request->entrega_id,
            'componente_id' => $request->id,
        ]);
        $componente = Componente::find($request->id);
        $componente->almacen = 0;
        $componente->equipo_id = $request->equipo;
        $componente->save();
        return response($componente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntregaComponente  $entregaComponente
     * @return \Illuminate\Http\Response
     */
    public function show(EntregaComponente $entregaComponente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EntregaComponente  $entregaComponente
     * @return \Illuminate\Http\Response
     */
    public function edit(EntregaComponente $entregaComponente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntregaComponenteRequest  $request
     * @param  \App\Models\EntregaComponente  $entregaComponente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntregaComponenteRequest $request, EntregaComponente $entregaComponente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntregaComponente  $entregaComponente
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntregaComponente $entregaComponente)
    {
        //
    }
   
}

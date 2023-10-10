<?php

namespace App\Http\Controllers;

use App\Models\EntregaEquipo;
use App\Http\Requests\StoreEntregaEquipoRequest;
use App\Http\Requests\UpdateEntregaEquipoRequest;
use App\Models\Equipo;
use Illuminate\Http\Request;

class EntregaEquipoController extends Controller
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
     * @param  \App\Http\Requests\StoreEntregaEquipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EntregaEquipo::create([
            'entrega_id' => $request->entrega_id,
            'equipo_id' => $request->equipo_id,
        ]);
        $equipo = Equipo::find($request->id);
        $equipo->funcionario_id = $request->funcionario_id;
        $equipo->entrega = 1;
        $equipo->save();
        return response($equipo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntregaEquipo  $entregaEquipo
     * @return \Illuminate\Http\Response
     */
    public function show(EntregaEquipo $entregaEquipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EntregaEquipo  $entregaEquipo
     * @return \Illuminate\Http\Response
     */
    public function edit(EntregaEquipo $entregaEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntregaEquipoRequest  $request
     * @param  \App\Models\EntregaEquipo  $entregaEquipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntregaEquipoRequest $request, EntregaEquipo $entregaEquipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntregaEquipo  $entregaEquipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntregaEquipo $entregaEquipo)
    {
        //
    }
}

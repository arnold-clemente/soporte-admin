<?php

namespace App\Http\Controllers;

use App\Models\RepliegueEquipo;
use App\Http\Requests\StoreRepliegueEquipoRequest;
use App\Http\Requests\UpdateRepliegueEquipoRequest;
use App\Models\Equipo;
use Illuminate\Http\Request;

class RepliegueEquipoController extends Controller
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
     * @param  \App\Http\Requests\StoreRepliegueEquipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RepliegueEquipo::create([
            'repliegue_id' => $request->repliegue_id,
            'equipo_id' => $request->equipo_id,
            'descripcion' => $request->descripcion,
        ]);
        $equipo = Equipo::find($request->equipo_id);
        $equipo->entrega = 0;
        $equipo->reparacion = 0;
        $equipo->prestamo = 0;
        $equipo->devolucion = 0;
        $equipo->repliegue = 1;
        $equipo->estado = "3";
        $equipo->save();

        return response($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RepliegueEquipo  $repliegueEquipo
     * @return \Illuminate\Http\Response
     */
    public function show(RepliegueEquipo $repliegueEquipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RepliegueEquipo  $repliegueEquipo
     * @return \Illuminate\Http\Response
     */
    public function edit(RepliegueEquipo $repliegueEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepliegueEquipoRequest  $request
     * @param  \App\Models\RepliegueEquipo  $repliegueEquipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepliegueEquipoRequest $request, RepliegueEquipo $repliegueEquipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RepliegueEquipo  $repliegueEquipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(RepliegueEquipo $repliegueEquipo)
    {
        //
    }
}

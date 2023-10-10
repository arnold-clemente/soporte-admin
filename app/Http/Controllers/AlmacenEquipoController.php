<?php

namespace App\Http\Controllers;

use App\Models\AlmacenEquipo;
use App\Http\Requests\StoreAlmacenEquipoRequest;
use App\Http\Requests\UpdateAlmacenEquipoRequest;
use App\Models\Equipo;
use Illuminate\Http\Request;

class AlmacenEquipoController extends Controller
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
     * @param  \App\Http\Requests\StoreAlmacenEquipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AlmacenEquipo::create([
            'almacen_id' => $request->almacen_id,
            'equipo_id' => $request->equipo_id,
            'descripcion' => $request->descripcion,
        ]);
        $equipo = Equipo::find($request->equipo_id);
        $equipo->funcionario_id = null;
        $equipo->almacen = 1;
        $equipo->save();

        return response($equipo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlmacenEquipo  $almacenEquipo
     * @return \Illuminate\Http\Response
     */
    public function show(AlmacenEquipo $almacenEquipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlmacenEquipo  $almacenEquipo
     * @return \Illuminate\Http\Response
     */
    public function edit(AlmacenEquipo $almacenEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlmacenEquipoRequest  $request
     * @param  \App\Models\AlmacenEquipo  $almacenEquipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlmacenEquipoRequest $request, AlmacenEquipo $almacenEquipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlmacenEquipo  $almacenEquipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlmacenEquipo $almacenEquipo)
    {
        //
    }
}

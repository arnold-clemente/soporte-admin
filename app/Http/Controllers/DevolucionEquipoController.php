<?php

namespace App\Http\Controllers;

use App\Models\DevolucionEquipo;
use App\Http\Requests\StoreDevolucionEquipoRequest;
use App\Http\Requests\UpdateDevolucionEquipoRequest;
use App\Models\Equipo;
use Illuminate\Http\Request;

class DevolucionEquipoController extends Controller
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
     * @param  \App\Http\Requests\StoreDevolucionEquipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DevolucionEquipo::create([
            'devolucion_id' => $request->devolucion_id,
            'equipo_id' => $request->equipo_id,
            'descripcion' => $request->descripcion,
        ]);
        $equipo = Equipo::find($request->equipo_id);
        $equipo->funcionario_id =  null;
        $equipo->entrega = 1;
        $equipo->almacen = 1;
        $equipo->prestamo = 0;
        $equipo->devolucion = 1;
        $equipo->save();

        return response($equipo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DevolucionEquipo  $devolucionEquipo
     * @return \Illuminate\Http\Response
     */
    public function show(DevolucionEquipo $devolucionEquipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DevolucionEquipo  $devolucionEquipo
     * @return \Illuminate\Http\Response
     */
    public function edit(DevolucionEquipo $devolucionEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDevolucionEquipoRequest  $request
     * @param  \App\Models\DevolucionEquipo  $devolucionEquipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDevolucionEquipoRequest $request, DevolucionEquipo $devolucionEquipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DevolucionEquipo  $devolucionEquipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DevolucionEquipo $devolucionEquipo)
    {
        //
    }
}

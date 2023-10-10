<?php

namespace App\Http\Controllers;

use App\Models\PrestamoEquipo;
use App\Http\Requests\StorePrestamoEquipoRequest;
use App\Http\Requests\UpdatePrestamoEquipoRequest;
use App\Models\Equipo;
use Illuminate\Http\Request;

class PrestamoEquipoController extends Controller
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
     * @param  \App\Http\Requests\StorePrestamoEquipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PrestamoEquipo::create([
            'prestamo_id' => $request->prestamo_id,
            'equipo_id' => $request->equipo_id,
            'descripcion' => $request->descripcion,
        ]);
        $equipo = Equipo::find($request->equipo_id);
        $equipo->funcionario_id =  $request->funcionario_id;
        $equipo->prestamo = 1;
        $equipo->save();

        return response($equipo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrestamoEquipo  $prestamoEquipo
     * @return \Illuminate\Http\Response
     */
    public function show(PrestamoEquipo $prestamoEquipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrestamoEquipo  $prestamoEquipo
     * @return \Illuminate\Http\Response
     */
    public function edit(PrestamoEquipo $prestamoEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrestamoEquipoRequest  $request
     * @param  \App\Models\PrestamoEquipo  $prestamoEquipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrestamoEquipoRequest $request, PrestamoEquipo $prestamoEquipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrestamoEquipo  $prestamoEquipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrestamoEquipo $prestamoEquipo)
    {
        //
    }
}

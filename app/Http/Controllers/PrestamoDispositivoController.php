<?php

namespace App\Http\Controllers;

use App\Models\PrestamoDispositivo;
use App\Http\Requests\StorePrestamoDispositivoRequest;
use App\Http\Requests\UpdatePrestamoDispositivoRequest;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class PrestamoDispositivoController extends Controller
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
     * @param  \App\Http\Requests\StorePrestamoDispositivoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PrestamoDispositivo::create([
            'prestamo_id' => $request->prestamo_id,
            'dispositivo_id' => $request->dispositivo_id,
            'descripcion' => $request->descripcion,
        ]);
        $dispositivo = Dispositivo::find($request->dispositivo_id);
        $dispositivo->funcionario_id = $request->funcionario_id;
        $dispositivo->prestamo = 1;
        $dispositivo->save();
        
        return response($dispositivo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrestamoDispositivo  $prestamoDispositivo
     * @return \Illuminate\Http\Response
     */
    public function show(PrestamoDispositivo $prestamoDispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrestamoDispositivo  $prestamoDispositivo
     * @return \Illuminate\Http\Response
     */
    public function edit(PrestamoDispositivo $prestamoDispositivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrestamoDispositivoRequest  $request
     * @param  \App\Models\PrestamoDispositivo  $prestamoDispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrestamoDispositivoRequest $request, PrestamoDispositivo $prestamoDispositivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrestamoDispositivo  $prestamoDispositivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrestamoDispositivo $prestamoDispositivo)
    {
        //
    }
}

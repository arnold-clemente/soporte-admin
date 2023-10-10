<?php

namespace App\Http\Controllers;

use App\Models\EntregaDispositivo;
use App\Http\Requests\StoreEntregaDispositivoRequest;
use App\Http\Requests\UpdateEntregaDispositivoRequest;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class EntregaDispositivoController extends Controller
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
     * @param  \App\Http\Requests\StoreEntregaDispositivoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EntregaDispositivo::create([
            'entrega_id' => $request->entrega_id,
            'dispositivo_id' => $request->id,
        ]);
        $dispositivo = Dispositivo::find($request->id);
        $dispositivo->funcionario_id = $request->funcionario_id;
        $dispositivo->entrega = 1;
        $dispositivo->save();
        return response($dispositivo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntregaDispositivo  $entregaDispositivo
     * @return \Illuminate\Http\Response
     */
    public function show(EntregaDispositivo $entregaDispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EntregaDispositivo  $entregaDispositivo
     * @return \Illuminate\Http\Response
     */
    public function edit(EntregaDispositivo $entregaDispositivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntregaDispositivoRequest  $request
     * @param  \App\Models\EntregaDispositivo  $entregaDispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntregaDispositivoRequest $request, EntregaDispositivo $entregaDispositivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntregaDispositivo  $entregaDispositivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntregaDispositivo $entregaDispositivo)
    {
        //
    }
}

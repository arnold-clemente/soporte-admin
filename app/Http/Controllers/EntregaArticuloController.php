<?php

namespace App\Http\Controllers;

use App\Models\EntregaArticulo;
use App\Http\Requests\StoreEntregaArticuloRequest;
use App\Http\Requests\UpdateEntregaArticuloRequest;
use App\Models\Articulo;
use App\Models\Componente;
use Illuminate\Http\Request;

class EntregaArticuloController extends Controller
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
     * @param  \App\Http\Requests\StoreEntregaArticuloRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EntregaArticulo::create([
            'entrega_id' => $request->entrega_id,
            'articulo_id' => $request->id,
            'cantidad' => $request->cantidad,
        ]);

        $articulo = Articulo::find($request->id);
        $articulo->cantidad = $articulo->cantidad - $request->cantidad;
        $articulo->save();

        Componente::create([
            'fecha' => $request->fecha,
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'tamano' => $request->tamano,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'equipo_id' => $request->equipo,
        ]);
        return response($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntregaArticulo  $entregaArticulo
     * @return \Illuminate\Http\Response
     */
    public function show(EntregaArticulo $entregaArticulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EntregaArticulo  $entregaArticulo
     * @return \Illuminate\Http\Response
     */
    public function edit(EntregaArticulo $entregaArticulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntregaArticuloRequest  $request
     * @param  \App\Models\EntregaArticulo  $entregaArticulo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntregaArticuloRequest $request, EntregaArticulo $entregaArticulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntregaArticulo  $entregaArticulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntregaArticulo $entregaArticulo)
    {
        //
    }
}

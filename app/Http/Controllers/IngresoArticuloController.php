<?php

namespace App\Http\Controllers;

use App\Models\IngresoArticulo;
use App\Http\Requests\StoreIngresoArticuloRequest;
use App\Http\Requests\UpdateIngresoArticuloRequest;
use App\Models\Articulo;
use Illuminate\Http\Request;

class IngresoArticuloController extends Controller
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
     * @param  \App\Http\Requests\StoreIngresoArticuloRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingresoArticulo = IngresoArticulo::create([
            'fecha' => $request->fecha,
            'cantidad' => $request->cantidad,
            'ingreso_id' => $request->ingreso_id,
            'articulo_id' => $request->id,            
        ]);

        $articulo = Articulo::find($ingresoArticulo->articulo_id);
        $articulo->cantidad = $articulo->cantidad + $ingresoArticulo->cantidad;
        $articulo->save();
      
        return response($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IngresoArticulo  $ingresoArticulo
     * @return \Illuminate\Http\Response
     */
    public function show(IngresoArticulo $ingresoArticulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IngresoArticulo  $ingresoArticulo
     * @return \Illuminate\Http\Response
     */
    public function edit(IngresoArticulo $ingresoArticulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIngresoArticuloRequest  $request
     * @param  \App\Models\IngresoArticulo  $ingresoArticulo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIngresoArticuloRequest $request, IngresoArticulo $ingresoArticulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IngresoArticulo  $ingresoArticulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(IngresoArticulo $ingresoArticulo)
    {
        //
    }
}

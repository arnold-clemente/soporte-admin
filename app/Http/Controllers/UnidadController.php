<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Http\Requests\StoreUnidadRequest;
use App\Http\Requests\UpdateUnidadRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidads = Unidad::all();

        return Inertia::render('unidad/Index', compact('unidads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('unidad/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnidadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dependencia' => 'required|string|max:255',
            'nomenclatura' => 'required|string|max:255',
            'informes' => 'numeric|min:000000|max:999999999',
            'notas' => 'numeric|min:000000|max:999999999',
        ]);
        Unidad::create([
            'nombre' => $request->nombre,
            'dependencia' => $request->dependencia,
            'nomenclatura' => $request->nomenclatura,
            'informes' => $request->informes,
            'notas' => $request->notas,
        ]);
        return response('creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function show(Unidad $unidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidad $unidad)
    {
        return Inertia::render('unidad/Edit', compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnidadRequest  $request
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidad $unidad)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'dependencia' => 'required|string|max:255',
            'nomenclatura' => 'required|string|max:255',
            'informes' => 'numeric|min:000000|max:999999999',
            'notas' => 'numeric|min:000000|max:999999999',
        ]);
        $unidad->update($data);
        return response('actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidad $unidad)
    {
        $unidad->activo = '0';
        $unidad->update();

        return response('eliminado');
    }
}

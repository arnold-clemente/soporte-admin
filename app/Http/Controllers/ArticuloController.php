<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Models\Categoria;
use App\Models\Tecnico;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::with('categoria')->get();

        return Inertia::render('articulos/Index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        $categorias = Categoria::where('activo', 1)->get();
        return Inertia::render('articulos/Create', compact('categorias', 'fecha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticuloRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $tecnico = Tecnico::where('user_id', $user_id)->first()->id;

        $request->validate([
            'codigo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255|unique:articulos',
            'categoria_id' => 'required',   
            'cantidad' => 'numeric|min:000000|max:999999999',         
            'tamano' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
        ]);
        $articulo = Articulo::create([
            'codigo' => $request->codigo,
            'fecha' => $request->fecha,
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id,
            'tamano' => $request->tamano,
            'cantidad' => $request->cantidad,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'descripcion' => $request->descripcion,
            'tecnico_id' => $tecnico,
        ]);
        return response($articulo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {        
        $categorias = Categoria::where('activo', 1)->get();

        return Inertia::render('articulos/Edit', compact('articulo', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticuloRequest  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        $data = $request->validate([
            'codigo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255|unique:articulos,nombre,' . $articulo->id,
            'categoria_id' => 'required',   
            'cantidad' => 'numeric|min:000000|max:999999999',         
            'tamano' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
        ]);
        $articulo->update($data);
        return response('actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->activo = '0';
        $articulo->update();

        return response('eliminado');
    }
}

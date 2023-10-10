<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Http\Requests\StoreNotaRequest;
use App\Http\Requests\UpdateNotaRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Models\Unidad;


class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notas = Nota::with('unidad', 'user')->get();

        return Inertia::render('notas/Index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::now();
        $unidads = Unidad::all();
        $fecha = $date->format('Y-m-d');
        return Inertia::render('notas/Create', compact('fecha', 'unidads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)    
    {
        $date = Carbon::now();
        $fecha_actual = $date->format('Y');
        $request->validate([
            'referencia' => 'required|string|max:255',
        ]);
        $fecha_ultimo = Nota::selectRaw('YEAR(fecha) as fecha, id')
            ->where('unidad_id', $request->unidad_id)
            ->orderBy('id', 'desc')
            ->first();

        if (is_null($fecha_ultimo)) {
            $nota = Unidad::select('notas')->where('id', $request->unidad_id)->orderBy('id', 'desc')->first();
            $numero = $nota->notas + 1;
        } else {
            if ($fecha_actual > $fecha_ultimo->fecha) {
                $numero = 1;
            } else {
                $ultimo_numero = Nota::select('numero', 'id')->where('unidad_id', $request->unidad_id)->orderBy('id', 'desc')->first();
                $numero = $ultimo_numero->numero + 1;
            }
        };
        Nota::create([
            'referencia' => $request->referencia,
            'fecha' => $request->fecha,
            'cite' => $numero . '/' . $fecha_actual,
            'numero' => $numero,
            'unidad_id' => $request->unidad_id,
            'user_id' => $request->user_id,
        ]);
        $nota_id= Nota::latest('id')->where('user_id', $request->user_id)->select('id')->first()->id;
        return response($nota_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        return Inertia::render('notas/Edit', compact('nota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotaRequest  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        $data = $request->validate([
            'referencia' => 'required|string|max:255',
        ]);
        $nota->update($data);
        return response($nota);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Http\Requests\StoreInformeRequest;
use App\Http\Requests\UpdateInformeRequest;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informes = Informe::with('unidad', 'user')->get();

        return Inertia::render('informes/Index', compact('informes'));
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
        return Inertia::render('informes/Create', compact('fecha', 'unidads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInformeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();
        $fecha_actual = $date->format('Y');
        $request->validate([
            'referencia' => 'required|string|max:255',
        ]);
        $fecha_ultimo = Informe::selectRaw('YEAR(fecha) as fecha, id')
            ->where('unidad_id', $request->unidad_id)
            ->orderBy('id', 'desc')
            ->first();

        if (is_null($fecha_ultimo)) {
            $informe = Unidad::select('informes')->where('id', $request->unidad_id)->orderBy('id', 'desc')->first();
            $numero = $informe->informes + 1;
        } else {
            if ($fecha_actual > $fecha_ultimo->fecha) {
                $numero = 1;
            } else {
                $ultimo_numero = Informe::select('numero', 'id')->where('unidad_id', $request->unidad_id)->orderBy('id', 'desc')->first();
                $numero = $ultimo_numero->numero + 1;
            }
        };
        Informe::create([
            'referencia' => $request->referencia,
            'fecha' => $request->fecha,
            'cite' => $numero . '/' . $fecha_actual,
            'numero' => $numero,
            'unidad_id' => $request->unidad_id,
            'user_id' => $request->user_id,
        ]);

        $informe_id = Informe::latest('id')->where('user_id', $request->user_id)->select('id')->first()->id;
        return response($informe_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit(Informe $informe)
    {
        return Inertia::render('informes/Edit', compact('informe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInformeRequest  $request
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informe $informe)
    {
        $data = $request->validate([
            'referencia' => 'required|string|max:255',
        ]);
        $informe->update($data);
        return response($informe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informe $informe)
    {
        //
    }
}

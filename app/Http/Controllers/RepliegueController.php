<?php

namespace App\Http\Controllers;

use App\Models\Repliegue;
use App\Http\Requests\StoreRepliegueRequest;
use App\Http\Requests\UpdateRepliegueRequest;
use App\Models\Componente;
use App\Models\Dispositivo;
use App\Models\Equipo;
use App\Models\Tecnico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RepliegueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $repliegues = Repliegue::with('tecnico', 'informe')->get();
        return Inertia::render('repliegues/Index', compact('repliegues'));
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

        $user_id = Auth::user()->id;
        $tecnico = Tecnico::where('user_id', $user_id)->first();

        $dispositivos = Dispositivo::where('reparacion', 0)
            ->where('prestamo', 0)
            ->where('repliegue', 0)
            ->get();

        $equipos = Equipo::where('reparacion', 0)
            ->where('prestamo', 0)
            ->where('repliegue', 0)
            ->get();

        $componentes = Componente::with('equipo')
            ->where('repliegue', 0)
            ->get();

        return Inertia::render('repliegues/Create', compact('fecha', 'dispositivos', 'equipos', 'componentes', 'tecnico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRepliegueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();
        $fecha_actual = $date->format('Y');
        $request->validate([
            'referencia' => 'required|string|max:255',
            'informe_id' => 'required',
        ]);
        $fecha_ultimo = Repliegue::selectRaw('YEAR(fecha) as fecha, id')
            ->orderBy('id', 'desc')
            ->first();

        if (is_null($fecha_ultimo)) {
            $numero = 1;
        } else {
            if ($fecha_actual > $fecha_ultimo->fecha) {
                $numero = 1;
            } else {
                $ultimo_numero = Repliegue::select('numero', 'id')->orderBy('id', 'desc')->first();
                $numero = $ultimo_numero->numero + 1;
            }
        };
        $codigo = $numero . '/' . $fecha_actual;
        $repliegue = Repliegue::create([
            'fecha' => $request->fecha,
            'codigo' => $codigo,
            'numero' => $numero,
            'tecnico_id' => $request->tecnico_id,
            'informe_id' => $request->informe_id,
        ]);

        return response($repliegue->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repliegue  $repliegue
     * @return \Illuminate\Http\Response
     */
    public function show(Repliegue $repliegue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repliegue  $repliegue
     * @return \Illuminate\Http\Response
     */
    public function edit(Repliegue $repliegue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepliegueRequest  $request
     * @param  \App\Models\Repliegue  $repliegue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepliegueRequest $request, Repliegue $repliegue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repliegue  $repliegue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repliegue $repliegue)
    {
        //
    }
}

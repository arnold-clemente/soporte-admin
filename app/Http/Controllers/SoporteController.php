<?php

namespace App\Http\Controllers;

use App\Models\Soporte;
use App\Http\Requests\StoreSoporteRequest;
use App\Http\Requests\UpdateSoporteRequest;
use App\Models\Dispositivo;
use App\Models\Equipo;
use App\Models\Funcionario;
use App\Models\SoporteDispositivo;
use App\Models\SoporteEquipo;
use App\Models\Tecnico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SoporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $soportes = Soporte::with('nota', 'funcionario', 'tecnico', 'informe')->where('solicitud', 1)->where('recepcion', 1)->get();
        return Inertia::render('soportes/Index', compact('soportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Soporte $soporte, Request $request)
    {
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        $user_id = Auth::user()->id;
        $tecnico = Tecnico::where('user_id', $user_id)->first();
        $soporte = Soporte::with('funcionario')->find($soporte->id);
        $funcionario = Funcionario::with('unidad')->find($soporte->funcionario_id);
        $equipos = SoporteEquipo::with('equipo')->where('soporte_id', $soporte->id)->get();
        $dispositivos = SoporteDispositivo::with('dispositivo')->where('soporte_id', $soporte->id)->get();

        return Inertia::render('soportes/Create', compact('funcionario', 'dispositivos', 'equipos', 'fecha', 'soporte', 'tecnico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSoporteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSoporteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soporte  $soporte
     * @return \Illuminate\Http\Response
     */
    public function show(Soporte $soporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soporte  $soporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Soporte $soporte, Request $request)
    {
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        $soporte = Soporte::with('funcionario', 'informe', 'nota')->find($soporte->id);
        $funcionario = Funcionario::with('unidad')->find($soporte->funcionario_id);
        $equipos = SoporteEquipo::with('equipo')->where('soporte_id', $soporte->id)->get();
        $dispositivos = SoporteDispositivo::with('dispositivo')->where('soporte_id', $soporte->id)->get();

        return Inertia::render('soportes/Edit', compact('funcionario', 'dispositivos', 'equipos', 'fecha', 'soporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSoporteRequest  $request
     * @param  \App\Models\Soporte  $soporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $soporte = Soporte::find($request->id);
        $soporte->numero = $request->numero;
        $soporte->codigo = $request->codigo;
        $soporte->fechasol = $request->fechasol;
        $soporte->solicitud = $request->solicitud;
        $soporte->fecharep = $request->fecharep;
        $soporte->recepcion = $request->recepcion;
        $soporte->fechasop = $request->fechasop;
        $soporte->soporte = $request->soporte;
        $soporte->tecnico_id = $request->tecnico_id;
        $soporte->funcionario_id = $request->funcionario_id;
        $soporte->nota_id = $request->nota_id;
        $soporte->informe_id = $request->informe_id;
        $soporte->save();

        return response($soporte);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soporte  $soporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soporte $soporte)
    {
        //
    }
}

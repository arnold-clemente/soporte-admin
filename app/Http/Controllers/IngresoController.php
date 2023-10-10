<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Http\Requests\StoreIngresoRequest;
use App\Http\Requests\UpdateIngresoRequest;
use App\Models\Articulo;
use App\Models\Funcionario;
use App\Models\Tecnico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos = Ingreso::with('tecnico', 'funcionario')->get();
        return Inertia::render('ingresos/Index', compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $tecnico = Tecnico::where('user_id', $user_id)->first();
        $funcionario = $request->funcionario;
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        $articulos = Articulo::with('categoria')->where('activo', 1)->get();
        $funcionarios = Funcionario::with('unidad')->where('activo', 1)->get();

        return Inertia::render('ingresos/Create', compact('fecha', 'articulos', 'funcionarios', 'tecnico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIngresoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
            'funcionario_id' => 'required',
        ]);

        $ingreso = Ingreso::create([
            'documento' => $request->documento,
            'codigo' => $request->codigo,
            'fecha' => $request->fecha,
            'tecnico_id' => $request->tecnico_id,
            'funcionario_id' => $request->funcionario_id,
        ]);
        return response($ingreso->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show(Ingreso $ingreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingreso $ingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIngresoRequest  $request
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIngresoRequest $request, Ingreso $ingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingreso $ingreso)
    {
        //
    }

    public function ingreso(Ingreso $ingreso)
    {
        $fecha = $ingreso->fecha;
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));

        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);

        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

        // CONSULTAS
        $fecha_literal = $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;
        $funcionario = Funcionario::with('unidad')->where('id', $ingreso->funcionario_id)->first();

        $nombre = $ingreso->id . "_Ingreso_" . $ingreso->fecha;
        $numero = 1;
        Pdf::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->setPaper('letter', 'portrait')
            ->loadView('reportes.ingreso', [
                'ingreso' => $ingreso,
                'fecha' => $fecha_literal,
                'funcionario' => $funcionario,
                'numero' => $numero,
            ]);
        return $pdf->stream($nombre);
    }
}

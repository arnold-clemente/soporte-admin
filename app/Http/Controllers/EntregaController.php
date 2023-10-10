<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Http\Requests\StoreEntregaRequest;
use App\Http\Requests\UpdateEntregaRequest;
use App\Models\Articulo;
use App\Models\Componente;
use App\Models\Dispositivo;
use App\Models\Equipo;
use App\Models\Funcionario;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Models\Unidad;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class EntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entregas = Entrega::with('nota', 'tecnico', 'funcionario')->get();

        return Inertia::render('entregas/Index', compact('entregas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        $tecnico = Tecnico::where('user_id', $user_id)->first();
        $funcionarios = Funcionario::with('unidad', 'equipos')->where('activo', 1)->get();
        $equipos = Equipo::where('entrega', 0)->orWhere('almacen', 1)->where('repliegue', 0)->get();
        $dispositivos = Dispositivo::where('entrega', 0)->orWhere('almacen', 1)->where('repliegue', 0)->get();
        $componentes = Componente::with('equipo')->where('almacen', 1)->where('repliegue', 0)->get();
        $articulos = Articulo::with('categoria')->where('activo', 1)->where('cantidad', '>', 0)->get();

        return Inertia::render('entregas/Create', compact('fecha', 'funcionarios', 'equipos', 'dispositivos', 'articulos', 'componentes', 'tecnico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEntregaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();
        $fecha_actual = $date->format('Y');
        $request->validate([
            'funcionario_id' => 'required',
            'nota_id' => 'required',
            'tecnico_id' => 'required',
        ]);
        $fecha_ultimo = Entrega::selectRaw('YEAR(fecha) as fecha, id')
            ->orderBy('id', 'desc')
            ->first();

        if (is_null($fecha_ultimo)) {
            $numero = 1;
        } else {
            if ($fecha_actual > $fecha_ultimo->fecha) {
                $numero = 1;
            } else {
                $ultimo_numero = Entrega::select('numero', 'id')->orderBy('id', 'desc')->first();
                $numero = $ultimo_numero->numero + 1;
            }
        };
        $entrega = Entrega::create([
            'referencia' => $request->referencia,
            'fecha' => $request->fecha,
            'codigo' => $numero . '/' . $fecha_actual,
            'numero' => $numero,
            'funcionario_id' => $request->funcionario_id,
            'tecnico_id' => $request->tecnico_id,
            'nota_id' => $request->nota_id,
        ]);
        return response($entrega->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrega  $entrega
     * @return \Illuminate\Http\Response
     */
    public function show(Entrega $entrega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrega  $entrega
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrega $entrega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntregaRequest  $request
     * @param  \App\Models\Entrega  $entrega
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntregaRequest $request, Entrega $entrega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrega  $entrega
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrega $entrega)
    {
        //
    }

    public function entrega(Entrega $entrega)
    {
        $fecha = $entrega->fecha;
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
        $funcionario = Funcionario::with('unidad')->where('id', $entrega->funcionario_id)->first();

        $nombre = $entrega->id . "_Nota_de_Entrega_" . $entrega->fecha;
        $numero = 1;
        Pdf::setOptions(['dpi' => 150, 'default' => 'sans-serif']);
        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->setPaper('letter', 'portrait')
            ->loadView('reportes.entrega', [
                'entrega' => $entrega,
                'fecha' => $fecha_literal,
                'funcionario' => $funcionario,
                'numero' => $numero,
            ]);
        return $pdf->stream($nombre);
    }
}

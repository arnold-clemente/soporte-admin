<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivo;
use App\Models\Equipo;
use App\Models\Funcionario;
use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Soporte;
use App\Models\SoporteDispositivo;
use App\Models\SoporteEquipo;
use App\Models\Tecnico;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soportes = Soporte::with('funcionario')->where('recepcion', 0)->get();
        return Inertia::render('solicitudes/Index', compact('soportes'));
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
        $funcionarios = Funcionario::with('unidad')->where('activo', 1)->get();
        $equipos = Equipo::where('entrega', 1)->where('reparacion', 0)->where('almacen', 0)->where('repliegue', 0)->get();
        $dispositivos = Dispositivo::where('entrega', 1)->where('reparacion', 0)->where('almacen', 0)->where('repliegue', 0)->get();
        return Inertia::render('solicitudes/Create', compact('fecha', 'funcionarios', 'equipos', 'dispositivos', 'tecnico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();
        $fecha_actual = $date->format('Y');
        $request->validate([
            'fecha' => 'required',
            'funcionario_id' => 'required',
            'tecnico_id' => 'required',
        ]);
        $fecha_ultimo = Soporte::selectRaw('YEAR(fechasol) as fecha, id')
            ->orderBy('id', 'desc')
            ->first();

        if (is_null($fecha_ultimo)) {
            $numero = 1;
        } else {
            if ($fecha_actual > $fecha_ultimo->fecha) {
                $numero = 1;
            } else {
                $ultimo_numero = Soporte::select('numero', 'id')->orderBy('id', 'desc')->first();
                $numero = $ultimo_numero->numero + 1;
            }
        };
        $codigo = $numero . '/' . $fecha_actual;
        $soporte = Soporte::create([
            'fechasol' => $request->fecha,
            'solicitud' => 1,
            'funcionario_id' => $request->funcionario_id,
            'numero' => $numero,
            'codigo' => $codigo,
        ]);
        return response($soporte->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Soporte $soporte, Request $request)
    {
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        $user_id = Auth::user()->id;
        $tecnico = Tecnico::where('user_id', $user_id)->first();
        $solicitud = Soporte::with('funcionario')->find($soporte->id);
        $funcionario = Funcionario::with('unidad')->find($soporte->funcionario_id);
        $equiposAdds = SoporteEquipo::with('equipo')->where('soporte_id', $soporte->id)->get();
        $dispositivosAdds = SoporteDispositivo::with('dispositivo')->where('soporte_id', $soporte->id)->get();
        // acambiar 
        $equipos = Equipo::where('entrega', 1)->where('reparacion', 0)->where('almacen', 0)->where('repliegue', 0)->get();
        $dispositivos = Dispositivo::where('entrega', 1)->where('reparacion', 0)->where('almacen', 0)->where('repliegue', 0)->get();
        
        return Inertia::render('solicitudes/Edit', compact('funcionario', 'dispositivos', 'equipos', 'fecha', 'solicitud', 'equiposAdds', 'dispositivosAdds', 'tecnico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function solicitud(Soporte $soporte)
    {
        $fecha = $soporte->fechasol;
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
        $funcionario = Funcionario::with('unidad')->where('id', $soporte->funcionario_id)->first();

        $nombre = $soporte->id . "_solicitud_" . $soporte->fecha;
        $numero = 1;
        Pdf::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->setPaper('letter', 'portrait')
            ->loadView('reportes.solicitud', [
                'soporte' => $soporte,
                'fecha' => $fecha_literal,
                'funcionario' => $funcionario,
                'numero' => $numero,
            ]);
        return $pdf->stream($nombre);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use App\Http\Requests\StoreDevolucionRequest;
use App\Http\Requests\UpdateDevolucionRequest;
use App\Models\Dispositivo;
use App\Models\Equipo;
use App\Models\Funcionario;
use App\Models\Tecnico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DevolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $devolucions = Devolucion::with('funcionario', 'tecnico', 'nota')
        ->get();
        return Inertia::render('devoluciones/Index', compact('devolucions'));
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

        $dispositivos = Dispositivo::where('entrega', 1)
            ->where('reparacion', 0)
            ->where('almacen', 0)
            ->where('prestamo', 1)
            ->where('devolucion', 0)
            ->where('repliegue', 0)
            ->get();

        $equipos = Equipo::where('entrega', 1)
            ->where('reparacion', 0)
            ->where('almacen', 0)
            ->where('prestamo', 1)
            ->where('devolucion', 0)
            ->where('repliegue', 0)
            ->get();

        return Inertia::render('devoluciones/Create', compact('funcionarios', 'equipos', 'dispositivos', 'fecha', 'tecnico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDevolucionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();
        $fecha_actual = $date->format('Y');
        $request->validate([
            'referencia' => 'required|string|max:255',
            'funcionario_id' => 'required',
            'nota_id' => 'required',
        ]);
        $fecha_ultimo = Devolucion::selectRaw('YEAR(fecha) as fecha, id')
            ->orderBy('id', 'desc')
            ->first();

        if (is_null($fecha_ultimo)) {
            $numero = 1;
        } else {
            if ($fecha_actual > $fecha_ultimo->fecha) {
                $numero = 1;
            } else {
                $ultimo_numero = Devolucion::select('numero', 'id')->orderBy('id', 'desc')->first();
                $numero = $ultimo_numero->numero + 1;
            }
        };
        $codigo = $numero . '/' . $fecha_actual;
        $devolucion =Devolucion::create([
            'fecha' => $request->fecha,
            'codigo' => $codigo,
            'numero' => $numero,
            'funcionario_id' => $request->funcionario_id,
            'tecnico_id' => $request->tecnico_id,
            'nota_id' => $request->nota_id,
        ]);

        return response($devolucion->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Devolucion  $devolucion
     * @return \Illuminate\Http\Response
     */
    public function show(Devolucion $devolucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Devolucion  $devolucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Devolucion $devolucion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDevolucionRequest  $request
     * @param  \App\Models\Devolucion  $devolucion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDevolucionRequest $request, Devolucion $devolucion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Devolucion  $devolucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devolucion $devolucion)
    {
        //
    }
}

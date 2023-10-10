<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Http\Requests\StoreAlmacenRequest;
use App\Http\Requests\UpdateAlmacenRequest;
use App\Models\Componente;
use App\Models\Dispositivo;
use App\Models\Equipo;
use App\Models\Funcionario;
use App\Models\Tecnico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $almacenes = Almacen::with('funcionario', 'tecnico', 'nota')->get();
        return Inertia::render('almacenes/Index', compact('almacenes'));
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
            ->where('prestamo', 0)
            ->where('repliegue', 0)
            ->get();

        $equipos = Equipo::where('entrega', 1)
            ->where('reparacion', 0)
            ->where('almacen', 0)
            ->where('prestamo', 0)
            ->where('repliegue', 0)
            ->get();

        $componentes = Componente::with('equipo')
            ->where('repliegue', 0)
            ->where('almacen', 0)
            ->get();

        return Inertia::render('almacenes/Create', compact('funcionarios', 'fecha', 'dispositivos', 'equipos', 'componentes', 'tecnico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlmacenRequest  $request
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
        $fecha_ultimo = Almacen::selectRaw('YEAR(fecha) as fecha, id')
            ->orderBy('id', 'desc')
            ->first();

        if (is_null($fecha_ultimo)) {
            $numero = 1;
        } else {
            if ($fecha_actual > $fecha_ultimo->fecha) {
                $numero = 1;
            } else {
                $ultimo_numero = Almacen::select('numero', 'id')->orderBy('id', 'desc')->first();
                $numero = $ultimo_numero->numero + 1;
            }
        };
        $codigo = $numero . '/' . $fecha_actual;
        $almacen = Almacen::create([
            'fecha' => $request->fecha,
            'codigo' => $codigo,
            'numero' => $numero,
            'funcionario_id' => $request->funcionario_id,
            'tecnico_id' => $request->tecnico_id,
            'nota_id' => $request->nota_id,
        ]);
       
        return response($almacen->id );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show(Almacen $almacen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function edit(Almacen $almacen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlmacenRequest  $request
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlmacenRequest $request, Almacen $almacen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Almacen $almacen)
    {
        //
    }
}

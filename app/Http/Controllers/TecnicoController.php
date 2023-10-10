<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use App\Http\Requests\StoreTecnicoRequest;
use App\Http\Requests\UpdateTecnicoRequest;
use App\Models\Unidad;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnicos = Tecnico::with('unidad')->get();

        return Inertia::render('tecnicos/index', compact('tecnicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('tecnicos/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTecnicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ci' => 'numeric|unique:tecnicos|min:000000|max:999999999',
            'cargo' => 'required|string|max:255',
            'unidad_id' => 'required|numeric',
            'usuario' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
        ]);

        $name = ucwords($request->nombres) . " " . ucwords($request->apellidos);

        $user = User::create([
            'name' => $name,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'tipo' => 'tecnico',
            'password' => bcrypt($request->ci),
        ]);

        $tecnico = Tecnico::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'ci' => $request->ci,
            'cargo' => $request->cargo,
            'unidad_id' => $request->unidad_id,
            'activo' => 1,
            'user_id' => $user->id,
        ]);

        return response($tecnico);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnico $tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnico $tecnico)
    {
        return Inertia::render('tecnicos/Edit', compact('tecnico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTecnicoRequest  $request
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnico $tecnico)
    {
        $data = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ci' => 'numeric|min:000000|max:999999999|unique:tecnicos,ci,' . $tecnico->id,
            'cargo' => 'required|string|max:255',
            'unidad_id' => 'required|numeric',
            'activo' => 'required',
        ]);

        $tecnico->update($data);
        return response($tecnico);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnico $tecnico)
    {
        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#$%&/()?-+{}[]_';
        $longitud = 12;
        $random = substr(str_shuffle($caracteres_permitidos), 0, $longitud);
        $usuario = $tecnico->user_id . $random;
        $email = $usuario . "@eliminado.com";
        // cambiar el usuario 
        $user = User::find($tecnico->user_id);
        $user->usuario = $usuario;
        $user->email = $email;
        $user->password = $usuario;
        $user->save();

        $tecnico->activo = 0;
        $tecnico->save();

        return response($user);
    }
}

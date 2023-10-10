<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Http\Requests\StoreFuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Models\Unidad;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::with('unidad')->get();

        return Inertia::render('funcionario/index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidads = Unidad::all();
        return Inertia::render('funcionario/Create', compact('unidads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFuncionarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ci' => 'numeric|unique:funcionarios|min:000000|max:999999999',
            'cargo' => 'required|string|max:255',
            'unidad_id' => 'required|numeric',
        ]);
        $nombre = ucwords($request->nombres);
        $apellido = ucwords($request->apellidos);
        $usuario = substr($apellido, 0 ,1) . strtok($nombre, " ") . "_" . $request->ci;
        $email = substr($apellido, 0 ,1) . strtok($nombre, " ") . "_" . $request->ci . "@gmail.com";
        $name = ucwords($request->nombres) . " " . ucwords($request->apellidos);

        $user = User::create([
            'name' => $name,
            'usuario' => $usuario,
            'email' => $email,
            'password' => bcrypt($request->ci),
            'tipo' => 'funcionario',
        ]);

        $funcionario = Funcionario::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'ci' => $request->ci,
            'cargo' => $request->cargo,
            'unidad_id' => $request->unidad_id,
            'activo' => 1,
            'user_id' => $user->id,
        ]);       

        return response($request );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        $unidads = Unidad::all();
        return Inertia::render('funcionario/Edit', compact('funcionario', 'unidads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFuncionarioRequest  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $data = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ci' => 'numeric|min:000000|max:999999999|unique:funcionarios,ci,' . $funcionario->id,
            'cargo' => 'required|string|max:255',
            'unidad_id' => 'required|numeric',
            'activo' => 'required',
        ]);

        $funcionario->update($data);
        return response($funcionario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        // para hacer el random de los usuarios 
        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#$%&/()?-+{}[]_';
        $longitud = 12;
        $random = substr(str_shuffle($caracteres_permitidos), 0, $longitud);
        $usuario = $funcionario->user_id . $random;
        $email = $usuario . "@eliminado.com";
        // cambiar el usuario 
        $user = User::find($funcionario->user_id);
        $user->usuario = $usuario;
        $user->email = $email;
        $user->password = $usuario;
        $user->save();

        $funcionario->activo = 0;
        $funcionario->save();

        return response($user);
    }

    public function password(Request $request, Funcionario $funcionario)
    {
        if ($request->password == $funcionario->id) {
            $funcionario->password = Hash::make($funcionario->ci);
            $funcionario->update();

            return response('Contraseña Restablecida');
        } else {
            $request->validate([
                'password' => 'required|string|min:8|max:255',
            ]);
            $funcionario->password = Hash::make($request->password);
            $funcionario->update();

            return response('Contraseña Actualizada');
        }
    }
}

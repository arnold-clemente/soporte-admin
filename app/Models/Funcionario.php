<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'ci',
        'cargo',
        'activo',
        'unidad_id',
        'user_id'
    ];

    //relacion muchso a uno funcionarios - unidad
    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    //relacion uno a muchos funcionario-equipos
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }

    //relacion uno a muchos funcionario-dispositivos
    public function dispositivos()
    {
        return $this->hasMany(Dispositivo::class);
    }

    //relacion uno a muchos funcionario - soportes
    public function soportes()
    {
        return $this->hasMany(Soporte::class);
    }

    //relacion uno a muchos funcionario - ingresos
    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
    }
}

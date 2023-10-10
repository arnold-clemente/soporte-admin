<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'fecha',
        'procesador',
        'placa',
        'entrega',
        'reparacion',
        'prestamo',
        'devolucion',
        'almacen',
        'repliegue',
        'estado',
        'descripcion',
        'tecnico_id',
        'funcionario_id',
    ];

    //relacion uno a muchos equipo-componentes
    public function componentes()
    {
        return $this->hasMany(Componente::class);
    }

    //relacion muchos a uno equipos-tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    //relacion muchos a uno equipos-funcionario
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    //relacion uno a muchos equipo - entrega_equipos
    public function entregaEquipos()
    {
        return $this->hasMany(EntregaEquipo::class);
    }

    //relacion uno a muchos equipo - soporteEquipos
    public function soporteEquipos()
    {
        return $this->hasMany(SoporteEquipo::class);
    }

    //relacion uno a muchos equipo - almacenEquipos
    public function almacenEquipos()
    {
        return $this->hasMany(AlmacenEquipo::class);
    }

    //relacion uno a muchos equipo - prestamoEquipos
    public function prestamoEquipos()
    {
        return $this->hasMany(PrestamoEquipo::class);
    }

    //relacion uno a muchos equipo - devolucionEquipos
    public function devolucionEquipos()
    {
        return $this->hasMany(DevolucionEquipo::class);
    }

    //relacion uno a muchos equipo - repliegueEquipos
    public function repliegueEquipos()
    {
        return $this->hasMany(RepliegueEquipo::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
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

    //relacion muchso a uno tecnicos - user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relacion muchso a uno tecnicos - unidad
    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    //relacion uno a muchos tecnico - equipos
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }

    //relacion uno a muchos tecnico - dispositivos
    public function dispositivos()
    {
        return $this->hasMany(Dispositivo::class);
    }

    //relacion uno a muchos tecnico - articulos
    public function articulos()
    {
        return $this->hasMany(Articulo::class);
    }

    //relacion uno a muchos tecnico - entregas
    public function entregas()
    {
        return $this->hasMany(Entrega::class);
    }

    //relacion uno a muchos tecnico - soportes
    public function soportes()
    {
        return $this->hasMany(Soporte::class);
    }

    //relacion uno a muchos tecnico - ingresos
    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
    }

    //relacion uno a muchos tecnico - almacens
    public function almacens()
    {
        return $this->hasMany(Almacen::class);
    }

    //relacion uno a muchos tecnico - prestamos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    //relacion uno a muchos tecnico - devolucions
    public function devolucions()
    {
        return $this->hasMany(Devolucion::class);
    }

    //relacion uno a muchos tecnico - repliegues
    public function repliegues()
    {
        return $this->hasMany(Repliegue::class);
    }
}

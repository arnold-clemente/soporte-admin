<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'fecha',
        'cite',
        'numero',
        'activo',
        'unidad_id',
        'user_id',
    ];

    //relacion muchos a uno informes - unidad
    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    //relacion muchos a uno informes - user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relacion uno a muchos nota - archivos
    public function archivos()
    {
        return $this->hasMany(Archivosnota::class);
    }

    //relacion uno a muchos nota - entrega
    public function entrega()
    {
        return $this->hasOne(Entrega::class);
    }

    //relacion uno a muchos nota - soporte
    public function soporte()
    {
        return $this->hasOne(Soporte::class);
    }

    //relacion uno a muchos nota - almacen
    public function almacen()
    {
        return $this->hasOne(Almacen::class);
    }

    //relacion uno a muchos nota - prestamo
    public function prestamo()
    {
        return $this->hasOne(Prestamo::class);
    }

    //relacion uno a muchos nota - devolucion
    public function devolucion()
    {
        return $this->hasOne(Devolucion::class);
    }
}

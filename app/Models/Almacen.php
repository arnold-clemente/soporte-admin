<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'numero',
        'codigo',
        'tecnico_id',
        'funcionario_id',
        'nota_id',
    ];

    //relacion muchos a uno almacen - tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    //relacion muchos a uno almacen - funcionario
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    // relacion uno a uno almacen - nota
    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

    // relacion uno a muchos almacen - almacenEquipos
    public function almacenEquipos()
    {
        return $this->hasMany(AlmacenDispositivo::class);
    }

    // relacion uno a muchos almacen - almacenDispositivos
    public function almacenDispositivos()
    {
        return $this->hasMany(AlmacenDispositivo::class);
    }

    // relacion uno a muchos almacen - almacenComponentes
    public function almacenComponentes()
    {
        return $this->hasMany(AlmacenComponente::class);
    }

}

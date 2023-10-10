<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'fecha',
        'nombre',
        'marca',
        'modelo',
        'tamano',
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

    //relacion muchos a uno dispositivos-tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    //relacion muchos a uno dispositivos-funcionario
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }


    //relacion uno a muchos dispositivo - entrega_dispositivos
    public function entregaDispositivos()
    {
        return $this->hasMany(EntregaDispositivo::class);
    }

    //relacion uno a muchos dispositivo - SoporteDispositivo
    public function soporteDispositivos()
    {
        return $this->hasMany(SoporteDispositivo::class);
    }

    //relacion uno a muchos dispositivo - almacenDispositivos
    public function almacenDispositivos()
    {
        return $this->hasMany(AlmacenDispositivo::class);
    }

    //relacion uno a muchos dispositivo - prestamoDispositivos
    public function prestamoDispositivos()
    {
        return $this->hasMany(PrestamoDispositivo::class);
    }

    //relacion uno a muchos dispositivo - devolucionDispositivos
    public function devolucionDispositivos()
    {
        return $this->hasMany(DevolucionDispositivo::class);
    }

    //relacion uno a muchos dispositivo - repliegueDispositivos
    public function repliegueDispositivos()
    {
        return $this->hasMany(Repliegue::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenDispositivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'almacen_id',
        'dispositivo_id',
    ];

    //relacion muchos a uno almacenDispositivos - almacen
    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    //relacion muchos a uno almacenDispositivos - dispositivo
    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }
}

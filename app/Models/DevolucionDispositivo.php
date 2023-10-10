<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevolucionDispositivo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'descripcion',
        'devolucion_id',
        'dispositivo_id',
    ];

    //relacion muchos a uno devolucionDispositivos - devolucion
    public function devolucion()
    {
        return $this->belongsTo(Devolucion::class);
    }

    //relacion muchos a uno devolucionDispositivos - dispositivo
    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoporteDispositivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'falencia',
        'solucion',
        'estado',
        'soporte_id',
        'dispositivo_id'
    ];

     //relacion muchos a uno soporteDispositivos - soporte
     public function soporte()
     {
         return $this->belongsTo(Soporte::class);
     }
 
     //relacion muchos a uno soporteDispositivos - dispositivo
     public function dispositivo()
     {
         return $this->belongsTo(Dispositivo::class);
     }
 
}

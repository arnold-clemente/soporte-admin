<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoporteEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'falencia',
        'solucion',
        'estado',
        'soporte_id',
        'equipo_id'
    ];

     //relacion muchos a uno soporteEquipo - soporte
     public function soporte()
     {
         return $this->belongsTo(Soporte::class);
     }
 
     //relacion muchos a uno soporteEquipo - equipo
     public function equipo()
     {
         return $this->belongsTo(Equipo::class);
     }
}

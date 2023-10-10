<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevolucionEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'devolucion_id',
        'equipo_id',
    ];

    //relacion muchos a uno devolucionEquipo - devolucion
    public function devolucion()
    {
        return $this->belongsTo(Devolucion::class);
    }

    //relacion muchos a uno devolucionEquipo - equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}

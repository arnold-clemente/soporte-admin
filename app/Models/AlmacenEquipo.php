<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'almacen_id',
        'equipo_id',
    ];

    //relacion muchos a uno almacenEquipos - almacen
    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    //relacion muchos a uno almacenEquipos - equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}

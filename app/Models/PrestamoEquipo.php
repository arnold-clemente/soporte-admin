<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'prestamo_id',
        'equipo_id',
    ];

    //relacion muchos a uno prestamoEquipos - prestamo
    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }

    //relacion muchos a uno prestamoEquipos - equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}

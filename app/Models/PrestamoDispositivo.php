<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoDispositivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'prestamo_id',
        'dispositivo_id',
    ];

    //relacion muchos a uno prestamoDispositivos - prestamo
    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }

    //relacion muchos a uno prestamoDispositivos - dispositivo
    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaDispositivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'entrega_id',
        'dispositivo_id',
    ];

    //relacion muchos a uno entrega_dispositivo - dispositivo
    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }

    //relacion muchos a uno entrega_dispositivo - entrega
    public function entrega()
    {
        return $this->belongsTo(Entrega::class);
    }
}

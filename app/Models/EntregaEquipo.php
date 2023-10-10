<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'entrega_id',
        'equipo_id',
    ];

    //relacion muchos a uno entrega_equipos - equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    //relacion muchos a uno entrega_equipos - entrega
    public function entrega()
    {
        return $this->belongsTo(Entrega::class);
    }
}

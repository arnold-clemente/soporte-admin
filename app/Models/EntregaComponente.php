<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaComponente extends Model
{
    use HasFactory;

    protected $fillable = [
        'entrega_id',
        'equipo_id',
        'componente_id',
    ];

    //relacion muchos a uno entrega_componentes - articulo
    public function componente()
    {
        return $this->belongsTo(Componente::class);
    }

    //relacion muchos a uno entrega_componentes - entrega
    public function entrega()
    {
        return $this->belongsTo(Entrega::class);
    }
}


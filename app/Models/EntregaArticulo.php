<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaArticulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'entrega_id',
        'articulo_id',
    ];

    //relacion muchos a uno entrega_articulos - articulo
    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }

    //relacion muchos a uno entrega_articulos - entrega
    public function entrega()
    {
        return $this->belongsTo(Entrega::class);
    }
}

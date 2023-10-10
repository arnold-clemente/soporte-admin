<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'numero',
        'nombre',
        'fecha',
        'marca',
        'modelo',
        'cantidad',
        'tamano',
        'descripcion',
        'activo',
        'tecnico_id',
        'categoria_id',

    ];

    //relacion muchos a uno articulos - categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //relacion muchos a uno articulos - tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    //relacion uno a muchos articulo - entrega_articulos
    public function entregaArticulos()
    {
        return $this->hasMany(EntregaArticulo::class);
    }

    // relacion uno a muchos articulo - ingresoArticulos
    public function ingresoArticulos()
    {
        return $this->hasMany(IngresoArticulo::class);
    }
}

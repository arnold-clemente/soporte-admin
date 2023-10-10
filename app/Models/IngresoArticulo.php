<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoArticulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'cantidad',
        'ingreso_id',
        'articulo_id',
    ]; 

    //relacion muchos a uno ingresoArticulos - articulo
    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }

    //relacion muchos a uno ingresoArticulos - ingreso
    public function ingreso()
    {
        return $this->belongsTo(Ingreso::class);
    }

}

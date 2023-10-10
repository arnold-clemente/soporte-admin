<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenComponente extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'almacen_id',
        'componente_id',
    ];

    //relacion muchos a uno almacenComponentes - almacen
    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    //relacion muchos a uno almacenComponentes - componente
    public function componente()
    {
        return $this->belongsTo(Componente::class);
    }
}

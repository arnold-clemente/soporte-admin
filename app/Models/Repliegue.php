<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repliegue extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'numero',
        'codigo',
        'tecnico_id',
        'informe_id',
    ];

    //relacion muchos a uno repliegue - tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    // relacion uno a uno repliegue - informe
    public function informe()
    {
        return $this->belongsTo(Informe::class);
    }

    // relacion uno a muchos repliegue - repliegueEquipos
    public function repliegueEquipos()
    {
        return $this->hasMany(RepliegueEquipo::class);
    }

    // relacion uno a muchos repliegue - repliegueDispositivos
    public function repliegueDispositivos()
    {
        return $this->hasMany(RepliegueDispositivo::class);
    }

    // relacion uno a muchos repliegue - repliegueComponentes
    public function repliegueComponentes()
    {
        return $this->hasMany(RepliegueComponente::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepliegueComponente extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'repliegue_id',
        'componente_id',
    ];

    //relacion muchos a uno repliegueComponentes - repliegue
    public function repliegue()
    {
        return $this->belongsTo(Repliegue::class);
    }


    //relacion muchos a uno repliegueComponentes - componente
    public function componente()
    {
        return $this->belongsTo(Componente::class);
    }
}

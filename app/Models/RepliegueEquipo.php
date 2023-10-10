<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepliegueEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'repliegue_id',
        'equipo_id',
    ];

    //relacion muchos a uno repliegueEquipo - repliegue
    public function repliegue()
    {
        return $this->belongsTo(Repliegue::class);
    }

    //relacion muchos a uno repliegueEquipo - equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}

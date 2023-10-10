<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepliegueDispositivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'repliegue_id',
        'dispositivo_id',
    ];

    //relacion muchos a uno repliegueDispositivos - repliegue
    public function repliegue()
    {
        return $this->belongsTo(Repliegue::class);
    }

    //relacion muchos a uno repliegueDispositivos - dispositivo
    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }
}

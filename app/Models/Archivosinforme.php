<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivosinforme extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'descripcion',
        'fecha',
        'informe_id',
        'user_id'
    ];

    //relacion muchos a uno ArchivoInformes - Informe
    public function informe()
    {
        return $this->belongsTo(Informe::class);
    }

    //relacion muchos a uno ArchivoInformes - user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

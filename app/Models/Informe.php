<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'fecha',
        'cite',
        'numero',
        'activo',
        'unidad_id',
        'user_id',
    ];


    //relacion muchos a uno informes - unidad
    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    //relacion muchos a uno informes - user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relacion uno a muchos informes - archivos
    public function archivos()
    {
        return $this->hasMany(Archivosinforme::class);
    }

    //relacion uno a muchos informe - soporte
    public function soporte()
    {
        return $this->hasOne(Soporte::class);
    }

     //relacion uno a muchos informe - repliegue
     public function repliegue()
     {
         return $this->hasOne(Repliegue::class);
     }

}

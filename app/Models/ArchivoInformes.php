<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivoInformes extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'descripcion',
        'fecha',
        'cite_informes_id',
        'user_id'
    ];

    //relacion muchos a uno ArchivoInformes - citesInforme
    public function cite()
    {
        return $this->belongsTo(CiteInforme::class);
    }

    //relacion muchos a uno ArchivoInformes - user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

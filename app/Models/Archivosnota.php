<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivosnota extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'descripcion',
        'fecha',
        'nota_id',
        'user_id'
    ];

    //relacion muchos a uno ArchivoNotas - nota
    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

    //relacion muchos a uno ArchivoNotas - user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

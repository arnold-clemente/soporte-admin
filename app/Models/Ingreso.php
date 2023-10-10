<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'documento',
        'codigo',
        'fecha',
        'tecnico_id',
        'funcionario_id',
    ];

    //relacion muchos a uno ingreso - tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    //relacion muchos a uno ingreso - funcionario
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    // relacion uno a muchos ingreso - ingresoArticulos
    public function ingresoArticulos()
    {
        return $this->hasMany(IngresoArticulo::class);
    }
}

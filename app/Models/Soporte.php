<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'codigo',
        'fechasol',
        'solicitud',
        'fecharep',
        'recepcion',
        'fechasop',
        'soporte',
        'tecnico_id',
        'funcionario_id',
        'informe_id',
        'nota_id',
    ];

    //relacion muchos a uno soportes - tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    //relacion muchos a uno soportes - funcionario
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    // relacion uno a uno soportes - nota
    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

    // relacion uno a uno soportes - informe
    public function informe()
    {
        return $this->belongsTo(Informe::class);
    }

    // relacion uno a muchos soporte - soporteEquipos
    public function soporteEquipos()
    {
        return $this->hasMany(SoporteEquipo::class);
    }

    // relacion uno a muchos soporte - soporteDispositivo
    public function soporteDispositivos()
    {
        return $this->hasMany(SoporteDispositivo::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'numero',
        'codigo',
        'tecnico_id',
        'funcionario_id',
        'nota_id',
    ];

    //relacion muchos a uno devolucion - tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    //relacion muchos a uno devolucion - funcionario
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    // relacion uno a uno devolucion - nota
    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

    // relacion uno a muchos devolucion - devolucionEquipos
    public function devolucionEquipos()
    {
        return $this->hasMany(DevolucionEquipo::class);
    }

    // relacion uno a muchos devolucion - devolucionDispositivos
    public function devolucionDispositivos()
    {
        return $this->hasMany(DevolucionDispositivo::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
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

    //relacion muchos a uno entregas - tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    //relacion muchos a uno entregas - funcionario
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    // relacion uno a uno entrega - nota
    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

    // relacion uno a muchos entrega - entregaEquipos
    public function entregaEquipos()
    {
        return $this->hasMany(EntregaEquipo::class);
    }

    // relacion uno a muchos entrega - entregaDispositivos
    public function entregaDispositivos()
    {
        return $this->hasMany(EntregaDispositivo::class);
    }

    // relacion uno a muchos entrega - entregaArticulos
    public function entregaArticulos()
    {
        return $this->hasMany(EntregaArticulo::class);
    }

    // relacion uno a muchos entrega - entregaComponente
    public function entregaComponente()
    {
        return $this->hasMany(EntregaComponente::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
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

    //relacion muchos a uno prestamo - tecnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    //relacion muchos a uno prestamo - funcionario
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    // relacion uno a uno prestamo - nota
    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

    // relacion uno a muchos prestamo - prestamoEquipos
    public function prestamoEquipos()
    {
        return $this->hasMany(PrestamoEquipo::class);
    }

    // relacion uno a muchos prestamo - prestamoDispositivos
    public function prestamoDispositivos()
    {
        return $this->hasMany(PrestamoDispositivo::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'nombre',
        'tipo',
        'tamano',
        'marca',
        'modelo',
        'almacen',
        'repliegue',
        'equipo_id',
    ];
    //relacion muchos a uno componentes-equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    // relacion uno a muchos componente - entregaComponentes
    public function entregaComponentes()
    {
        return $this->hasMany(EntregaComponente::class);
    }

    // relacion uno a muchos componente - almacenComponentes
    public function almacenComponentes()
    {
        return $this->hasMany(AlmacenComponente::class);
    }

    // relacion uno a muchos componente - repliegueComponentes
    public function repliegueComponentes()
    {
        return $this->hasMany(RepliegueComponente::class);
    }
}

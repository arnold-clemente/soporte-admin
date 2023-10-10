<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nomenclatura',
        'informes',
        'notas',
        'activo',
        'dependencia',
    ];

    // relacion uno a muchos unidad - users
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    // relacion uno a muchos unidad - funcionarios
    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }

    //relacion uno a muchos unidad - informes
    public function informes()
    {
        return $this->hasMany(Informe::class);
    }

    //relacion uno a muchos unidad - notas
    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}

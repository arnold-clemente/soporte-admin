<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        Categoria::create([
            'nombre' => 'Disco Duro HDD',
            'descripcion' => 'sin descripcion',
        ]);
        Categoria::create([
            'nombre' => 'Disco Duro SDD',
            'descripcion' => 'sin descripcion',
        ]);
        Categoria::create([
            'nombre' => 'Memoria Ram',
            'descripcion' => 'sin descripcion',
        ]);
        Categoria::create([
            'nombre' => 'Tarjeta de Video',
            'descripcion' => 'sin descripcion',
        ]);
        Categoria::create([
            'nombre' => 'Tarjeta de Audio',
            'descripcion' => 'sin descripcion',
        ]);
        Categoria::create([
            'nombre' => 'Tarjeta lan',
            'descripcion' => 'sin descripcion',
        ]);
        Categoria::create([
            'nombre' => 'Tarjeta Wifi',
            'descripcion' => 'sin descripcion',
        ]);
        Categoria::create([
            'nombre' => 'Lector DVD',
            'descripcion' => 'sin descripcion',
        ]);        
    }
}

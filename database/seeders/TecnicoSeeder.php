<?php

namespace Database\Seeders;

use App\Models\Tecnico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tecnico::create(['nombres' => 'Administrador', 'apellidos' => 'Administrador', 'ci' => 111111111, 'cargo' => 'Administrador', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '1',]);
        Tecnico::create(['nombres' => 'Arnold', 'apellidos' => 'Clemente', 'ci' => 9122179, 'cargo' => 'tecnico', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '2',]);
        Tecnico::create(['nombres' => 'Cristina Lili', 'apellidos' => 'Rivera Llanos', 'ci' => 1002123, 'cargo' => 'tecnico', 'unidad_id' => 1, 'activo' => '1', 'user_id' => '3',]);
    }
}

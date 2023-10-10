<?php

namespace Database\Seeders;

use App\Models\Unidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidad::create([
            'nombre' => 'Unidad de Soporte Técnico y Mantenimiento de Sistemas',
            'dependencia' => 'Sdeff',
            'nomenclatura' => 'RRHH/SDEF/USTSM',
            'notas' => 30,
            'informes' => 21,
        ]);

        Unidad::create([
            'nombre' => 'Unidad de Prueba 1',
            'dependencia' => 'RRHH',
            'nomenclatura' => 'RRHH/SDEF/',
            'notas' => 0,
            'informes' => 0,
        ]);

        Unidad::create([
            'nombre' => 'Unidad de Prueba 2',
            'dependencia' => 'SECRETARIUA GENARL',
            'nomenclatura' => 'RRHH/SEC/',
            'notas' => 3,
            'informes' => 4,
        ]);

        Unidad::create([
            'nombre' => 'Unidad de Prueba 3',
            'dependencia' => 'FINANZAS',
            'nomenclatura' => 'CONT/SDEF/',
            'notas' => 2,
            'informes' => 2,
        ]);
    }
}

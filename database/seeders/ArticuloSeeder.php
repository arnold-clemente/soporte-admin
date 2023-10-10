<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Articulo::create(['codigo' => '1/12', 'numero' => 1, 'nombre' => 'Ram ddr2 2gb', 'fecha' => '2022-04-03', 'marca' => 'samsung', 'modelo' => 'xsa-12', 'cantidad' => 2, 'tamano' => '2 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 3,]);
        Articulo::create(['codigo' => '2/12', 'numero' => 2, 'nombre' => 'Ram ddr3 2 gb', 'fecha' => '2022-04-03', 'marca' => 'samsung', 'modelo' => 'xsa-13', 'cantidad' => 3, 'tamano' => '2 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 3,]);
        Articulo::create(['codigo' => '3/12', 'numero' => 3, 'nombre' => 'Ram ddr4 2gb', 'fecha' => '2022-04-03', 'marca' => 'samsung', 'modelo' => 'xsa-14', 'cantidad' => 4, 'tamano' => '2 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 3,]);
        Articulo::create(['codigo' => '4/12', 'numero' => 4, 'nombre' => 'Ram ddr2 4gb', 'fecha' => '2022-04-03', 'marca' => 'samsung', 'modelo' => 'xsa-15', 'cantidad' => 12, 'tamano' => '4 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 2, 'categoria_id' => 3,]);
        Articulo::create(['codigo' => '5/12', 'numero' => 5, 'nombre' => 'Ram ddr3 4 gb', 'fecha' => '2022-04-03', 'marca' => 'samsung', 'modelo' => 'xsa-16', 'cantidad' => 12, 'tamano' => '4 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 3,]);
        Articulo::create(['codigo' => '6/12', 'numero' => 6, 'nombre' => 'Ram ddr4 4gb', 'fecha' => '2022-04-03', 'marca' => 'samsung', 'modelo' => 'xsa-17', 'cantidad' => 11, 'tamano' => '4 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 3,]);
        Articulo::create(['codigo' => '7/12', 'numero' => 7, 'nombre' => 'Ram ddr2 8gb', 'fecha' => '2022-04-03', 'marca' => 'samsung', 'modelo' => 'xsa-18', 'cantidad' => 7, 'tamano' => '8 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 3,]);
        Articulo::create(['codigo' => '8/12', 'numero' => 8, 'nombre' => 'Ram ddr3 8gb', 'fecha' => '2022-04-03', 'marca' => 'samsung', 'modelo' => 'xsa-19', 'cantidad' => 8, 'tamano' => '8 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 3,]);
        Articulo::create(['codigo' => '9/12', 'numero' => 9, 'nombre' => 'Ram ddr4 8gb', 'fecha' => '2022-04-03', 'marca' => 'samsung', 'modelo' => 'xsa-20', 'cantidad' => 9, 'tamano' => '8 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 3,]);
        Articulo::create(['codigo' => '10/12', 'numero' => 10, 'nombre' => 'disco duro SDD TERA', 'fecha' => '2022-04-03', 'marca' => 'toshiba', 'modelo' => 'cs-24', 'cantidad' => 12, 'tamano' => '1 tera', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 2,]);
        Articulo::create(['codigo' => '11/12', 'numero' => 11, 'nombre' => 'disco duro SDD 500', 'fecha' => '2022-04-03', 'marca' => 'toshiba', 'modelo' => 'cs-25', 'cantidad' => 12, 'tamano' => '500 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 2,]);
        Articulo::create(['codigo' => '12/12', 'numero' => 12, 'nombre' => 'disco duro HDD tera', 'fecha' => '2022-04-03', 'marca' => 'toshiba', 'modelo' => 'xsa-21', 'cantidad' => 12, 'tamano' => '1 tera', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 2, 'categoria_id' => 1,]);
        Articulo::create(['codigo' => '24/32', 'numero' => 13, 'nombre' => 'disco duro HDD 500', 'fecha' => '2022-04-03', 'marca' => 'toshiba', 'modelo' => 'cs-26', 'cantidad' => 12, 'tamano' => '500 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 2, 'categoria_id' => 1,]);
        Articulo::create(['codigo' => '24/33', 'numero' => 14, 'nombre' => 'Video genesis', 'fecha' => '2022-04-03', 'marca' => 'intel', 'modelo' => 'cs-27', 'cantidad' => 5, 'tamano' => '2gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 2, 'categoria_id' => 4,]);
        Articulo::create(['codigo' => '24/34', 'numero' => 15, 'nombre' => 'video asrock', 'fecha' => '2022-04-03', 'marca' => 'intel', 'modelo' => 'xsa-22', 'cantidad' => 5, 'tamano' => '4 gb', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 2, 'categoria_id' => 4,]);
        Articulo::create(['codigo' => '24/35', 'numero' => 16, 'nombre' => 'Audio', 'fecha' => '2022-04-03', 'marca' => 'intel', 'modelo' => 'cs-26', 'cantidad' => 4, 'tamano' => '2 puertos', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 2, 'categoria_id' => 5,]);
        Articulo::create(['codigo' => '24/36', 'numero' => 17, 'nombre' => 'Audio ultimate', 'fecha' => '2022-04-03', 'marca' => 'intel', 'modelo' => 'cs-27', 'cantidad' => 4, 'tamano' => '2 puertos', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 2, 'categoria_id' => 5,]);
        Articulo::create(['codigo' => '24/37', 'numero' => 18, 'nombre' => 'Tarjeta Lan', 'fecha' => '2022-04-03', 'marca' => 'cisco', 'modelo' => 'cs-28', 'cantidad' => 2, 'tamano' => 'sin tamaño', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 6,]);
        Articulo::create(['codigo' => '24/38', 'numero' => 19, 'nombre' => 'tarjeta Wifi', 'fecha' => '2022-04-03', 'marca' => 'cisco', 'modelo' => 'xsa-23', 'cantidad' => 6, 'tamano' => 'sin tamaño', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 7,]);
        Articulo::create(['codigo' => '24/39', 'numero' => 20, 'nombre' => 'Lector DVD', 'fecha' => '2022-04-03', 'marca' => 'samsung', 'modelo' => 'cs-28', 'cantidad' => 3, 'tamano' => 'sin tamaño', 'descripcion' => 'sin descriocion', 'activo' => 1, 'tecnico_id' => 1, 'categoria_id' => 8,]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Equipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        Equipo::create(['codigo' => '1500021-12', 'fecha' => '2021-03-01', 'procesador' => 'core i5', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500022-12', 'fecha' => '2021-03-02', 'procesador' => 'core i3', 'placa' => 'Micro-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500023-12', 'fecha' => '2021-03-03', 'procesador' => 'core i3', 'placa' => 'Mini-ITX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500024-12', 'fecha' => '2021-03-04', 'procesador' => ' core i7', 'placa' => 'Nano-ITX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500025-12', 'fecha' => '2021-03-05', 'procesador' => 'rytzen 3', 'placa' => 'Nano-ITX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500026-12', 'fecha' => '2021-03-06', 'procesador' => 'core i5', 'placa' => 'Nano-ITX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500027-12', 'fecha' => '2021-03-07', 'procesador' => 'core i3', 'placa' => 'Nano-ITX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500028-12', 'fecha' => '2021-03-08', 'procesador' => 'core i3', 'placa' => 'Mini-ITX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500021-13', 'fecha' => '2021-03-09', 'procesador' => ' core i7', 'placa' => 'Mini-ITX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 2, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500022-13', 'fecha' => '2021-03-10', 'procesador' => 'rytzen 3', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 2, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500023-13', 'fecha' => '2021-03-11', 'procesador' => 'core i5', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 2, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500024-13', 'fecha' => '2021-03-12', 'procesador' => 'core i3', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 2, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500025-13', 'fecha' => '2021-03-13', 'procesador' => 'core i3', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 2, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500026-13', 'fecha' => '2021-03-14', 'procesador' => ' core i7', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 2, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500027-13', 'fecha' => '2021-03-15', 'procesador' => 'rytzen 3', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 2, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500028-13', 'fecha' => '2021-03-16', 'procesador' => 'core i5', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500021-14', 'fecha' => '2021-03-17', 'procesador' => 'core i3', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500022-14', 'fecha' => '2021-03-18', 'procesador' => 'core i3', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500023-14', 'fecha' => '2021-03-19', 'procesador' => ' core i7', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500024-14', 'fecha' => '2021-03-20', 'procesador' => 'rytzen 3', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
        Equipo::create(['codigo' => '1500025-14', 'fecha' => '2021-03-21', 'procesador' => 'rytzen 3', 'placa' => 'Estándar-ATX', 'descripcion' => 'sin descripicon', 'estado' => '1', 'activo' => 1, 'tecnico_id' => 1, 'entrega' => 0, 'reparacion' => 0, 'prestamo' => 0, 'devolucion' => 0, 'almacen' => 0, 'repliegue' => 0,]);
    }
}

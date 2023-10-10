<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'administrador']);
        $role2 = Role::create(['name' => 'funcionario']);

        $permission = Permission::create(['name' => 'admin.roles', 'description' => 'Vista Roles', 'modules' => 'user'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear Roles', 'modules' => 'user'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.roles.update', 'description' => 'Editar Rol', 'modules' => 'user'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.roles.delete', 'description' => 'Eliminar Rol', 'modules' => 'user'])->syncRoles([$role1]);
        
        $permission = Permission::create(['name' => 'admin.usuarios', 'description' => 'Vista Usuarios', 'modules' => 'tecnico'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'admin.usuarios.create', 'description' => 'Crear Usuario', 'modules' => 'tecnico'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.usuarios.update', 'description' => 'Editar Usuario', 'modules' => 'tecnico'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.usuarios.delete', 'description' => 'Eliminar Usuario', 'modules' => 'tecnico'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.usuarios.password', 'description' => 'Cambiar Contraseña', 'modules' => 'tecnico'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'admin.usuarios.excel', 'description' => 'Exportar Excel Usuarios', 'modules' => 'tecnico'])->syncRoles([$role1]);

    }
}

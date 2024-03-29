<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UnidadSeeder::class); 
        $this->call(TecnicoSeeder::class);       
        $this->call(FuncionarioSeeder::class);        
        $this->call(EquipoSeeder::class);
        $this->call(ComponenteSeeder::class);
        $this->call(DispositivoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ArticuloSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

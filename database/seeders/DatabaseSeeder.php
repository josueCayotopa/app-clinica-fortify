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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            
           /*
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleHasPermissionSeeder::class,
            UserSeeder::class,
            
            Tipo_DocumentoSeeder::class,
            NacionalidadSeeder::class,
            DepartamentoRegionSeeder::class,
            TipoEstablecimientoSeeder::class,
            ViaSeeder::class,
            ZonaSeeder::class,
            */
          // ProvinciaSeeder::class,
          // DistritoSeeder::class,
          ViaSeeder::class,
          ZonaSeeder::class,

        ]);
    }
}

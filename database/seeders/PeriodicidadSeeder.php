<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodicidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodicidads')->insert([
            [ 'codigo_sunat' => 1,'descripcion' => 'MENSUAL', 'estado' => true],
            ['codigo_sunat' => 2, 'descripcion' => 'QUINCENAL', 'estado' => true],
            [ 'codigo_sunat' => 3,'descripcion' => 'SEMANAL', 'estado' => true],
            [ 'codigo_sunat' => 4,'descripcion' => 'DIARIA', 'estado' => true],
            [ 'codigo_sunat' => 5,'descripcion' => 'OTROS', 'estado' => true]
        ]);
        
        
    }
}

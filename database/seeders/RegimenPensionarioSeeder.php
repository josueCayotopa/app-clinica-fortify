<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegimenPensionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('regimen_pencionarios')->insert([
            ['codigo' => 2, 'descripcion' => 'DECRETO LEY 19990 - SISTEMA NACIONAL DE PENSIONES - ONP', 'estado' => true],
            ['Codigo' => 3, 'descripcion' => 'DECRETO LEY 20530 - SISTEMA NACIONAL DE PENSIONES', 'estado' => true],
            ['Codigo' => 9, 'descripcion' => 'CAJA DE BENEFICIOS DE SEGURIDAD SOCIAL DEL PESCADOR', 'estado' => true],
            ['Codigo' => 10, 'descripcion' => 'CAJA DE PENSIONES MILITAR', 'estado' => true],
            ['Codigo' => 11, 'descripcion' => 'CAJA DE PENSIONES POLICIAL', 'estado' => true],
            ['Codigo' => 12, 'descripcion' => 'OTROS REGIMENES PENSIONARIOS', 'estado' => true],
            ['Codigo' => 21, 'descripcion' => 'SPP INTEGRA', 'estado' => true],
            ['Codigo' => 22, 'descripcion' => 'SPP HORIZONTE', 'estado' => true],
            ['Codigo' => 23, 'descripcion' => 'SPP PROFUTURO', 'estado' => true],
            ['Codigo' => 24, 'descripcion' => 'SPP PRIMA', 'estado' => true],
            ['Codigo' => 99, 'descripcion' => 'SIN REGIMEN PENSIONARIO', 'estado' => true],
        ]);
        
        
    }
}

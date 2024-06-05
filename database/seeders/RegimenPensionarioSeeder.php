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
            ['codigo_sunat' => 2, 'descripcion' => 'DECRETO LEY 19990 - SISTEMA NACIONAL DE PENSIONES - ONP', 'estado' => true],
            ['codigo_sunat' => 3, 'descripcion' => 'DECRETO LEY 20530 - SISTEMA NACIONAL DE PENSIONES', 'estado' => true],
            ['codigo_sunat' => 9, 'descripcion' => 'CAJA DE BENEFICIOS DE SEGURIDAD SOCIAL DEL PESCADOR', 'estado' => true],
            ['codigo_sunat' => 10, 'descripcion' => 'CAJA DE PENSIONES MILITAR', 'estado' => true],
            ['codigo_sunat' => 11, 'descripcion' => 'CAJA DE PENSIONES POLICIAL', 'estado' => true],
            ['codigo_sunat' => 12, 'descripcion' => 'OTROS REGIMENES PENSIONARIOS', 'estado' => true],
            ['codigo_sunat' => 21, 'descripcion' => 'SPP INTEGRA', 'estado' => true],
            ['codigo_sunat' => 22, 'descripcion' => 'SPP HORIZONTE', 'estado' => true],
            ['codigo_sunat' => 23, 'descripcion' => 'SPP PROFUTURO', 'estado' => true],
            ['codigo_sunat' => 24, 'descripcion' => 'SPP PRIMA', 'estado' => true],
            ['codigo_sunat' => 99, 'descripcion' => 'SIN REGIMEN PENSIONARIO', 'estado' => true],
        ]);
        
        
    }
}

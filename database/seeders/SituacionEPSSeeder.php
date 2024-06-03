<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacionEPSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('situacion_e_p_s')->insert([
            ['codigo_sunat' => 10, 'Descripcion' => 'AFILIADO A EPS - ACTIVO O SUBSIDIADO (EPS/SERV. PROPIOS)', 'estado' => true],
            ['codigo_sunat' => 12, 'Descripcion' => 'AFILIADO A EPS - BAJA (EPS/SERV. PROPIOS)', 'estado' => true],
            ['codigo_sunat' => 14, 'Descripcion' => 'AFILIADO A EPS - SUSPENSIÓN PERFECTA (EPS/SERV. PROPIOS)', 'estado' => true],
            ['codigo_sunat' => 18, 'Descripcion' => 'AFILIADO A EPS - SIN VÍNCULO LABORAL CON CONCEPTOS PENDIENTES DE LIQUIDAR (EPS/SERV. PROPIOS)', 'estado' => true],
            ['codigo_sunat' => 11, 'Descripcion' => 'NO AFILIADO A EPS - ACTIVO O SUBSIDIADO (EPS/SERV. PROPIOS)', 'estado' => true],
        ]);
        
    }
}

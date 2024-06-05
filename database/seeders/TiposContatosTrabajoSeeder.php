<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposContatosTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_contratos_trabajos')->insert([
            ['codigo_sunat' => 1, 'descripcion' => 'A PLAZO INDETERMINADO', 'estado' => true],
            ['codigo_sunat' => 2, 'descripcion' => 'A TIEMPO PARCIAL', 'estado' => true],
            ['codigo_sunat' => 3, 'descripcion' => 'POR INICIO O INCREMENTO DE ACTIVIDAD', 'estado' => true],
            ['codigo_sunat' => 4, 'descripcion' => 'POR NECESIDADES DEL MERCADO', 'estado' => true],
            ['codigo_sunat' => 5, 'descripcion' => 'POR RECONVERSIÓN EMPRESARIAL', 'estado' => true],
            ['codigo_sunat' => 6, 'descripcion' => 'OCASIONAL', 'estado' => true],
            ['codigo_sunat' => 7, 'descripcion' => 'DE SUPLENCIA', 'estado' => true],
            ['codigo_sunat' => 8, 'descripcion' => 'DE EMERGENCIA', 'estado' => true],
            ['codigo_sunat' => 9, 'descripcion' => 'PARA OBRA DETERMINADA O SERVICIO ESPECÍFICO', 'estado' => true],
            ['codigo_sunat' => 10,'descripcion' => 'INTERMITENTE', 'estado' => true],
            ['codigo_sunat' => 11,'descripcion' => 'DE TEMPORADA', 'estado' => true],
            ['codigo_sunat' => 12,'descripcion' => 'DE EXPORTACIÓN NO TRADICIONAL', 'estado' => true],
            ['codigo_sunat' => 13,'descripcion' => 'DE EXTRANJERO', 'estado' => true],
            ['codigo_sunat' => 14,'descripcion' => 'ADMINISTRATIVO DE SERVICIOS', 'estado' => true],
            ['codigo_sunat' => 99,'descripcion' => 'OTROS', 'estado' => true],
        ]);
        
    }
}

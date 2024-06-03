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
            ['codigo_sunat' => 1, 'Descripcion' => 'A PLAZO INDETERMINADO', 'estado' => true],
            ['codigo_sunat' => 2, 'Descripcion' => 'A TIEMPO PARCIAL', 'estado' => true],
            ['codigo_sunat' => 3, 'Descripcion' => 'POR INICIO O INCREMENTO DE ACTIVIDAD', 'estado' => true],
            ['codigo_sunat' => 4, 'Descripcion' => 'POR NECESIDADES DEL MERCADO', 'estado' => true],
            ['codigo_sunat' => 5, 'Descripcion' => 'POR RECONVERSIÓN EMPRESARIAL', 'estado' => true],
            ['codigo_sunat' => 6, 'Descripcion' => 'OCASIONAL', 'estado' => true],
            ['codigo_sunat' => 7, 'Descripcion' => 'DE SUPLENCIA', 'estado' => true],
            ['codigo_sunat' => 8, 'Descripcion' => 'DE EMERGENCIA', 'estado' => true],
            ['codigo_sunat' => 9, 'Descripcion' => 'PARA OBRA DETERMINADA O SERVICIO ESPECÍFICO', 'estado' => true],
            ['codigo_sunat' => 10, 'Descripcion' => 'INTERMITENTE', 'estado' => true],
            ['codigo_sunat' => 11, 'Descripcion' => 'DE TEMPORADA', 'estado' => true],
            ['codigo_sunat' => 12, 'Descripcion' => 'DE EXPORTACIÓN NO TRADICIONAL', 'estado' => true],
            ['codigo_sunat' => 13, 'Descripcion' => 'DE EXTRANJERO', 'estado' => true],
            ['codigo_sunat' => 14, 'Descripcion' => 'ADMINISTRATIVO DE SERVICIOS', 'estado' => true],
            ['codigo_sunat' => 99, 'Descripcion' => 'OTROS', 'estado' => true],
        ]);
        
    }
}

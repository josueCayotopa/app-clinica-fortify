<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoComprobanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_comprobantes')->insert([
            ['codigo_sunat'=>'R', 'descripcion' => 'RECIBO POR HONORARIO', 'estado' => true],
            ['codigo_sunat'=>'N', 'descripcion' => 'NOTA DE CRÉDITO', 'estado' => true],
            [ 'codigo_sunat'=>'D','descripcion' => 'DIETA', 'estado' => true],
            [ 'codigo_sunat'=>'O','descripcion' => 'OTRO COMPROBANTE', 'estado' => true],
        ]);
        

    }
}

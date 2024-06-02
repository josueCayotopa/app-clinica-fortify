<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TipoCambioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_cambios')->insert([
            [
                'fecha_de_cambio' => Carbon::now()->format('Y-m-d'),
                'impuesto_a_la_venta' => 3.25,
                'impuesto_a_la_compra' => 3.20,
                'fecha_que_actualiza' => Carbon::now()->addDay()->format('Y-m-d'),
                'imp_venta_cierre' => 3.27,
                'imp_compra_cierre' => 3.22,
                'codigo_moneda' => 1, // Asumiendo que el ID 1 existe en tipo_de_moneda
                'cod_moneda_referencia' => 2, // Asumiendo que el ID 2 existe en tipo_de_moneda

            
            ],
            // Añade más registros si es necesario
        ]);
    }
}

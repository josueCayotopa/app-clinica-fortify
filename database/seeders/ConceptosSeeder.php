<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConceptosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conceptos')->insert([
            [
                'COD_CONCEPTO' => '0001',
                'COD_EMPRESA' => 1,
                'DES_NOMBRE' => '002',
                'DES_NOMBRE_CORTO' => 'BASICO',
                'NUM_VER_PLAN_CUENTAS' => '001',
                'TIP_CONCEPTO' => 'IN',
                'COD_CUENTA_CARGO' => '62110101',
                'TIP_OPERACION' => 'BA',
                'IND_FORMULA' => 'N',
                'COD_CUENTA_ABONO' => '0987654321',
                'COD_FORMULA' => '001',
                'NUM_GRUPO' => 1,
                'TIP_RENTA_QTACAT' => 'AF',
                'TIP_APLICACION' => 'ME',
                'IND_GRATIFICA' => 'S',
                'COD_MONEDA_DEFAULT' => 3,
                'IND_RECIBE_CONCEPTO' => 'N',
                'TIP_CTS' => 'FI',
                'TIP_INGRESO' => 'IM',
                'TIP_AUTO_MAN' => 'MA',
                'IND_TOTAL' => 'N',
                'COD_CONCEPTO_ORIGEN' => NULL,
                'COD_USER_ACTUAL' => NULL,
                'IND_GRATI_SEM' => 'S',
                'CTA_CARGO_SALARIO' => '6211',
                'CTA_ABONO_SALARIO' => NULL,
                'IND_UTILIDADES' => 'S',
                'COD_SUNAT' => '0121',
                'DES_NOMBRE_SUNAT' => 'REMUNERACIÓN O JORNAL BÁSICO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Agrega más registros según sea necesario
        ]);
    }
}

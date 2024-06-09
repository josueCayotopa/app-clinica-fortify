<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConceptosCuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('conceptos_cuentas')->insert([
            [
                'CODIGO' => '62110101',
                'DESCRIPCION' => 'SUELDO BASICO',
                'CODIGO_CUENTA_CON' => null,
                'CODIGO_CONCEPTO' => '0001'
            ],

        ]);
    }
}

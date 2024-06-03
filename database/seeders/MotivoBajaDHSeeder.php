<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivoBajaDHSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('motivo_baja_d_h_s')->insert([
            ['descripcion' => 'FALLECIMIENTO', 'estado' => true],
            ['descripcion' => 'OTROS', 'estado' => true],
            ['descripcion' => 'DIVORCIO O DISOLUCIÓN DE VÍNCULO MATRIMONIAL', 'estado' => true],
            ['descripcion' => 'FIN DE CONCUBINATO', 'estado' => true],
            ['descripcion' => 'FIN DE LA GESTACIÓN', 'estado' => true],
            ['descripcion' => 'HIJO MAYOR DE EDAD', 'estado' => true],
        ]);
    }
}

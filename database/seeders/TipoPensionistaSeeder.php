<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPensionistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_pensionistas')->insert([
            ['codigo_sunat' => '24', 'descripcion' => 'PENSIONISTA O CESANTE'],
            ['codigo_sunat' => '16', 'descripcion' => 'PENSIONISTA - LEY 28320'],
        ]);
    }
}

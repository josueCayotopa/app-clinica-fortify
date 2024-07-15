<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SctrPensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('s_c_t_r_pensions')->insert([
            ['descripcion' => 'Ninguno'],
            ['descripcion' => 'ONP'],
            ['descripcion' => 'Seguro Privado'],
        ]);
    }
}

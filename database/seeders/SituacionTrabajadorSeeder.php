<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacionTrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $situaciones = [
            ['descripcion' => 'Ninguna'],
            ['descripcion' => 'Administrativo'],
            ['descripcion' => 'Trabajador de confianza'],
        ];
        DB::table('situacion_trabajadors')->insert($situaciones);
    }
}

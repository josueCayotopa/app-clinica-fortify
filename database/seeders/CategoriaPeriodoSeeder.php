<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaPeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categorias = [
            ['descripcion' => 'Trabajador'],
            ['descripcion' => 'Pensionista'],
            ['descripcion' => 'Modalidad Formativa'],
        ];

        DB::table('categoria_periodos')->insert($categorias);


    }
}

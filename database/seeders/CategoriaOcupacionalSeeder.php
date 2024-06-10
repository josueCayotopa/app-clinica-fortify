<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaOcupacionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categoria_ocupacionals')->insert([
            [ 'DESCRIPCION' => 'EJECUTIVO'],
            [ 'DESCRIPCION' => 'OBRERO'],
            [ 'DESCRIPCION' => 'EMPLEADO'],
        ]);
    }
}

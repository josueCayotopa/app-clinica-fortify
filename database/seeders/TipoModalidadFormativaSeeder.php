<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoModalidadFormativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_modalidad_formativas')->insert([
            ['descripcion' => 'APRENDIZAJE CON PREDOMINIO EN LA EMPRESA', 'estado' => true],
            ['descripcion' => 'PRÁCTICAS PRE - PROFESIONALES', 'estado' => true],
            ['descripcion' => 'PRÁCTICAS PROFESIONALES', 'estado' => true],
            ['descripcion' => 'CAPACITACIÓN LABORAL JUVENIL', 'estado' => true],
            ['descripcion' => 'PASANTÍA EN LA EMPRESA', 'estado' => true],
            ['descripcion' => 'DOCENTE Y/O CATEDRÁTICO CON CONVENIO DE PASANTÍA', 'estado' => true],
            ['descripcion' => 'REINSERCIÓN LABORAL', 'estado' => true],
        ]);
        
    }
}

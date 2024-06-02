<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NivelEducativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'descripcion' => 'SIN EDUCACIÓN FORMAL',
                'estado' => true,
                
            ],
            [
                'descripcion' => 'EDUCACIÓN ESPECIAL INCOMPLETA',
                'estado' => true,
               
            ],
            [
                'descripcion' => 'EDUCACIÓN ESPECIAL COMPLETA',
                'estado' => true,
               
            ],
            [
                'descripcion' => 'EDUCACIÓN PRIMARIA INCOMPLETA',
                'estado' => true,
               
            ],
            [
                'descripcion' => 'EDUCACIÓN PRIMARIA COMPLETA',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'EDUCACIÓN SECUNDARIA INCOMPLETA',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'EDUCACIÓN SECUNDARIA COMPLETA',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'EDUCACIÓN TÉCNICA INCOMPLETA',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'EDUCACIÓN TÉCNICA COMPLETA',
                'estado' => true,
              
            ],
            
            [
                'descripcion' => 'EDUCACIÓN SUPERIOR (INSTITUTO SUPERIOR, ETC) INCOMPLETA',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'EDUCACIÓN UNIVERSITARIA INCOMPLETA',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'EDUCACIÓN UNIVERSITARIA COMPLETA',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'GRADO DE BACHILLER',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'TITULADO',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'ESTUDIOS DE MAESTRÍA INCOMPLETA',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'ESTUDIOS DE MAESTRÍA COMPLETA',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'GRADO DE MAESTRÍA',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'ESTUDIOS DE DOCTORADO INCOMPLETO',
                'estado' => true,
              
            ],
            [
                'descripcion' => 'ESTUDIOS DE DOCTORADO COMPLETO',
                'estado' => true,
              
            ],  [
                'descripcion' => 'GRADO DE DOCTOR',
                'estado' => true,
              
            ],

        ];

        DB::table('nivel_educativos')->insert($data);
    }
}

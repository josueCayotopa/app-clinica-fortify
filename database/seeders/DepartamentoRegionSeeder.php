<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // se crea los departamentos 
        $data = [

            ['codigo' => '01', 'descripcion' => 'DEPARTAMENTO AMAZONAS','nacionalidad_id'=> 193],
            ['codigo' => '02', 'descripcion' => 'DEPARTAMENTO ANCASH'  ,  'nacionalidad_id'=> 193],
            ['codigo' => '03', 'descripcion' => 'DEPARTAMENTO APURIMAC',  'nacionalidad_id'=> 193],
            ['codigo' => '04', 'descripcion' => 'DEPARTAMENTO AREQUIPA',  'nacionalidad_id'=> 193],
            ['codigo' => '05', 'descripcion' => 'DEPARTAMENTO AYACUCHO',  'nacionalidad_id'=> 193],
            ['codigo' => '06', 'descripcion' => 'DEPARTAMENTO CAJAMARCA',  'nacionalidad_id'=> 193],
            ['codigo' => '07', 'descripcion' => 'PROV. CONST. DEL CALLAO',  'nacionalidad_id'=> 193],
            ['codigo' => '08', 'descripcion' => 'DEPARTAMENTO CUSCO',  'nacionalidad_id'=> 193],
            ['codigo' => '09', 'descripcion' => 'DEPARTAMENTO HUANCAVELICA',  'nacionalidad_id'=> 193],
            ['codigo' => '10', 'descripcion' => 'DEPARTAMENTO HUANUCO',  'nacionalidad_id'=> 193],
            ['codigo' => '11', 'descripcion' => 'DEPARTAMENTO ICA',  'nacionalidad_id'=> 193],
            ['codigo' => '12', 'descripcion' => 'DEPARTAMENTO JUNIN',  'nacionalidad_id'=> 193],
            ['codigo' => '13', 'descripcion' => 'DEPARTAMENTO LA LIBERTAD', 'nacionalidad_id'=> 193],
            ['codigo' => '14', 'descripcion' => 'DEPARTAMENTO LAMBAYEQUE',  'nacionalidad_id'=> 193],
            ['codigo' => '15', 'descripcion' => 'DEPARTAMENTO LIMA',  'nacionalidad_id'=> 193],
            ['codigo' => '16', 'descripcion' => 'DEPARTAMENTO LORETO', 'nacionalidad_id'=> 193],
            ['codigo' => '17', 'descripcion' => 'DEPARTAMENTO MADRE DE DIOS', 'nacionalidad_id'=> 193],
            ['codigo' => '18', 'descripcion' => 'DEPARTAMENTO MOQUEGUA',  'nacionalidad_id'=> 193],
            ['codigo' => '19', 'descripcion' => 'DEPARTAMENTO PASCO',  'nacionalidad_id'=> 193],
            ['codigo' => '20', 'descripcion' => 'DEPARTAMENTO PIURA', 'nacionalidad_id'=> 193],
            ['codigo' => '21', 'descripcion' => 'DEPARTAMENTO PUNO',  'nacionalidad_id'=> 193],
            ['codigo' => '22', 'descripcion' => 'DEPARTAMENTO SAN MARTIN',  'nacionalidad_id'=> 193],
            ['codigo' => '23', 'descripcion' => 'DEPARTAMENTO TACNA',  'nacionalidad_id'=> 193],
            ['codigo' => '24', 'descripcion' => 'DEPARTAMENTO TUMBES',  'nacionalidad_id'=> 193],
            ['codigo' => '25', 'descripcion' => 'DEPARTAMENTO UCAYALI',  'nacionalidad_id'=> 193],
        ];

        DB::table('departamento__regions')->insert($data);






    }
}

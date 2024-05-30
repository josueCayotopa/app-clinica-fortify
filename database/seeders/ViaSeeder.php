<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViaSeeder extends Seeder
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
          [ 'descripcion' => 'AVENIDA'],
          [ 'descripcion' => 'JIRÓN'],
          [ 'descripcion' => 'CALLE'],
          [ 'descripcion' => 'PASAJE'],
          [ 'descripcion' => 'ALAMEDA'],
          [ 'descripcion' => 'MALECÓN'],
          [ 'descripcion' => 'OVALO'],
          [ 'descripcion' => 'PARQUE'],
          [ 'descripcion' => 'PLAZA'],
          [ 'descripcion' => 'CARRETERA'],
          [ 'descripcion' => 'BLOCK'],



        ];
        
        DB::table('via')->insert($data);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipo_DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'descripcion' => 'DOC. NACIONAL DE IDENTIDAD'],
            [ 'descripcion' => 'CARNÉ DE EXTRANJERÍA'],
            [ 'descripcion' => 'REG. ÚNICO DE CONTRIBUYENTES (*)'],
            [ 'descripcion' => 'PASAPORTE'],
            [ 'descripcion' => 'PARTIDA DE NACIMIENTO'],

        ];
        DB::table('tipo_documentos')->insert($data);
    }
}

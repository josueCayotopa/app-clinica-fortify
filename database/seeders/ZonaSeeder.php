<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        
        $data=[ 
            [ 'descripcion' => 'URB. URBANIZACIÓN'],
            [ 'descripcion' => 'P.J. PUEBLO JOVEN'],
            [ 'descripcion' => 'U.V. UNIDAD VECINAL'],
            [ 'descripcion' => 'C.H. CONJUNTO HABITACIONAL'],
            [ 'descripcion' => 'A.H. ASENTAMIENTO HUMANO'],
            [ 'descripcion' => 'COO. COOPERATIVA'],
            [ 'descripcion' => 'RES. RESIDENCIAL'],
            [ 'descripcion' => 'Z.I. ZONA INDUSTRIAL'],
            [ 'descripcion' => 'GRU. GRUPO'],


        ];
        DB::table('zona')->insert($data);
    

    }
}

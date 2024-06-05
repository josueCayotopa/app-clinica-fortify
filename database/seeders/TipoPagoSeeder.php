<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_pagos')->insert([
            [ 'descripcion' => 'EFECTIVO', 'estado' => true],
            [ 'descripcion' => 'DEPÓSITO EN CUENTA', 'estado' => true],
            [ 'descripcion' => 'OTROS', 'estado' => true],
        ]);
        

    }
}

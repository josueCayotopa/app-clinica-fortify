<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EPSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('e_p_s')->insert([
            [ 'ruc' => '20514372251', 'descripcion' => 'PERSALUD S.A. ENTIDAD PRESTADORA DE SALUD', 'estado' => true],
            [ 'ruc' => '20431115825', 'descripcion' => 'PACÍFICO S.A. ENTIDAD PRESTADORA DE SALUD', 'estado' => true],
            [ 'ruc' => '20414955020', 'descripcion' => 'RÍMAC INTERNACIONAL S.A. ENTIDAD PRESTADORA DE SALUD', 'estado' => true],
            [ 'ruc' => '0', 'descripcion' => 'SERVICIOS PROPIOS', 'estado' => true],
            [ 'ruc' => '20517182673', 'descripcion' => 'MAPFRE PERU S.A. ENTIDAD PRESTADORA DE SALUD', 'estado' => true],
            [ 'ruc' => '20523470761', 'descripcion' => 'COLSANITAS PERU S.A. ENTIDAD PRESTADORA DE SALUD', 'estado' => true],
        ]);
        
    }
}

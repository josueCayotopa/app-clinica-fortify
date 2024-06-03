<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivoFinPeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('motivo_fin_periodos')->insert([
            ['descripcion' => 'RENUNCIA', 'estado' => true],
            ['descripcion' => 'RENUNCIA CON INCENTIVOS', 'estado' => true],
            [ 'descripcion' => 'DESPIDO O DESTITUCIÓN', 'estado' => true],
            [ 'descripcion' => 'CESE COLECTIVO', 'estado' => true],
            [ 'descripcion' => 'JUBILACIÓN', 'estado' => true],
            [ 'descripcion' => 'INVALIDEZ ABSOLUTA PERMANENTE', 'estado' => true],
            [ 'descripcion' => 'TERMINACIÓN DE LA OBRA O SERVICIO O VENCIMIENTO DEL PLAZO', 'estado' => true],
            [ 'descripcion' => 'MUTUO DISENSO', 'estado' => true],
            [ 'descripcion' => 'FALLECIMIENTO', 'estado' => true],
            ['descripcion' => 'SUSPENSIÓN DE LA PENSIÓN', 'estado' => true],
            ['descripcion' => 'REASIGNACIÓN SERVIDOR DE LA ADMINISTRACIÓN PÚBLICA', 'estado' => true],
        ]);
        

    }
}

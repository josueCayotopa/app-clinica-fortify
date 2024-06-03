<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSuspensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_suspensions')->insert([
            ['codigo_sunat' => 01, 'descripcion' => 'S.P. SANCIÓN DISCIPLINARIA', 'estado' => true],
            ['codigo_sunat' => 02,'descripcion' => 'S.P. EJERCICIO DEL DERECHO DE HUELGA', 'estado' => true],
            [ 'codigo_sunat' => 03,'descripcion' => 'S.P. DETENCIÓN DEL TRABAJADOR, SALVO EL CASO DE CONDENA PRIVATIVA DE LA LIBERTAD', 'estado' => true],
            [ 'codigo_sunat' => 04,'descripcion' => 'S.P. PERMISO O LICENCIA CONCEDIDOS POR EL EMPLEADOR SIN GOCE DE HABER', 'estado' => true],
            [ 'codigo_sunat' => 05,'descripcion' => 'S.P. CASO FORTUITO O FUERZA MAYOR', 'estado' => true],
            [ 'codigo_sunat' => 06,'descripcion' => 'S.P. POR TEMPORADA O INTERMITENTE', 'estado' => true],
            [ 'codigo_sunat' => 07,'descripcion' => 'S.P. FALTA NO JUSTIFICADA', 'estado' => true],
            [ 'codigo_sunat' => 08,'descripcion' => 'S.I. ENFERMEDAD O ACCIDENTE (PRIMEROS VEINTE DÍAS)', 'estado' => true],
            [ 'codigo_sunat' => 20,'descripcion' => 'S.P. POR TEMPORADA O INTERMITENTE', 'estado' => true],
 
            [ 'codigo_sunat' => 21,'descripcion' => 'S.I. INCAPACIDAD TEMPORAL (INVALIDEZ, ENFERMEDAD Y ACCIDENTES)', 'estado' => true],
            [ 'codigo_sunat' => 22,'descripcion' => 'S.I. MATERNIDAD DURANTE EL DESCANSO PRE Y POST NATAL', 'estado' => true],
            [ 'codigo_sunat' => 23,'descripcion' => 'S.I. DESCANSO VACACIONAL', 'estado' => true],
            [ 'codigo_sunat' => 24,'descripcion' => 'S.I. LICENCIA PARA DESEMPEÑAR CARGO CÍVICO Y PARA CUMPLIR CON EL SERVICIO MILITAR OBLIGATORIO', 'estado' => true],
            [ 'codigo_sunat' => 25,'descripcion' => 'S.I. PERMISO Y LICENCIA PARA EL DESEMPEÑO DE CARGOS SINDICALES', 'estado' => true],
            [ 'codigo_sunat' => 26,'descripcion' => 'S.I. LICENCIA CON GOCE DE HABER', 'estado' => true],
            [ 'codigo_sunat' => 27,'descripcion' => 'S.I. DÍAS COMPENSADOS POR HORAS TRABAJADAS EN SOBRETIEMPO', 'estado' => true],


        ]);

    }
}

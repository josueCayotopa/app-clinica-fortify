<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OcupacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tipo_trabajadors')->insert([
            ['descripcion' => 'MARINA, OFICIALES', 'estado' => true, 'codigo_sunat' => '11001'],
            ['descripcion' => 'EJERCITO,OFICIALES', 'estado' => true, 'codigo_sunat' => '11002'],
            ['descripcion' => 'AVIACION, OFICIAL', 'estado' => true, 'codigo_sunat' => '11003'],
            ['descripcion' => 'MARINA, TECNICOS', 'estado' => true, 'codigo_sunat' => '12001'],
            ['descripcion' => 'EJERCITO, TECNICOS', 'estado' => true, 'codigo_sunat' => '12002'],
            ['descripcion' => 'AVIACION, TECNICOS', 'estado' => true, 'codigo_sunat' => '12003'],
            ['descripcion' => 'MARINA, SUB OFICIALES', 'estado' => true, 'codigo_sunat' => '13001'],
            ['descripcion' => 'EJERCITO, SUB OFICIALES', 'estado' => true, 'codigo_sunat' => '13002'],
            ['descripcion' => 'AVIACION, SUB OFICIALES', 'estado' => true, 'codigo_sunat' => '13003'],
            ['descripcion' => 'MARINA, PERSONAL DE SERVICIO MILITAR', 'estado' => true, 'codigo_sunat' => '14001'],
            ['descripcion' => 'EJERCITO, PERSONAL DE SERVICIO MILITAR', 'estado' => true, 'codigo_sunat' => '14002'],
            ['descripcion' => 'AVIACION, PERSONAL DE SERVICIO MILITAR', 'estado' => true, 'codigo_sunat' => '14003'],
            ['descripcion' => 'MILITAR NO ESPECIFICADO', 'estado' => true, 'codigo_sunat' => '15001'],
            ['descripcion' => 'POLICIA NACIONAL, OFICIALES', 'estado' => true, 'codigo_sunat' => '21001'],
            ['descripcion' => 'POLICIA NACIONAL, TECNICOS', 'estado' => true, 'codigo_sunat' => '22001'],
            ['descripcion' => 'POLICIA NACIONAL, SUB OFICIALES', 'estado' => true, 'codigo_sunat' => '23001'],
            ['descripcion' => 'POLICIA NO ESPECIFICADO', 'estado' => true, 'codigo_sunat' => '24001'],
            ['descripcion' => 'CANCILLER', 'estado' => true, 'codigo_sunat' => '111001'],
            ['descripcion' => 'CONGRESISTA', 'estado' => true, 'codigo_sunat' => '111002'],
            ['descripcion' => 'CONSEJERO, GOBIERNO', 'estado' => true, 'codigo_sunat' => '111003'],
            ['descripcion' => 'CONSULES EN FUNCION (PERUANOS)', 'estado' => true, 'codigo_sunat' => '111004'],
            ['descripcion' => 'CONTRALOR GENERAL', 'estado' => true, 'codigo_sunat' => '111005'],
            ['descripcion' => 'DIPUTADO', 'estado' => true, 'codigo_sunat' => '111006'],
            ['descripcion' => 'EMBAJADORES EN FUNCION (PERUANOS)', 'estado' => true, 'codigo_sunat' => '111007'],
            ['descripcion' => 'FISCAL DE LA NACION', 'estado' => true, 'codigo_sunat' => '111008'],
            ['descripcion' => 'PRESIDENTE DE GOBIERNO REGIONAL', 'estado' => true, 'codigo_sunat' => '111009'],
            ['descripcion' => 'JEFE DE ORGANISMO DE DESARROLLO', 'estado' => true, 'codigo_sunat' => '111010'],
            ['descripcion' => 'LEGISLADOR', 'estado' => true, 'codigo_sunat' => '111011'],
            ['descripcion' => 'MINISTRO, DE ESTADO', 'estado' => true, 'codigo_sunat' => '111012'],
            ['descripcion' => 'MINISTRO PLENIPOTENCIARIO', 'estado' => true, 'codigo_sunat' => '111013'],
            ['descripcion' => 'PREFECTO', 'estado' => true, 'codigo_sunat' => '111014'],
            
        ]);

    }
}

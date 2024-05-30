<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEstablecimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'descripcion' => 'DOMICILIO FISCAL'],
            [ 'descripcion' => 'CASA MATRIZ'],
            [ 'descripcion' => 'SUCURSAL'],
            [ 'descripcion' => 'AGENCIA'],
            [ 'descripcion' => 'LOCAL COMERCIAL O DE SERVICIOS'],
            [ 'descripcion' => 'SEDE PRODUCTIVA'],
            [ 'descripcion' => 'DEPOSITO (ALMACÉN)'],
            [ 'descripcion' => 'OFICINA ADMINISTRATIVA'],

        ];
        DB::table('tipo_establecimiento')->insert($data);
        

    }
}

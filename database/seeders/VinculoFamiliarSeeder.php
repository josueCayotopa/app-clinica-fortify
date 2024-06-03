<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VinculoFamiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vinculo_familiars')->insert([
            [ 'descripcion' => 'HIJO', 'estado' => true],
            [ 'descripcion' => 'CÓNYUGE', 'estado' => true],
            [ 'descripcion' => 'CONCUBINA(O)', 'estado' => true],
            [ 'descripcion' => 'GESTANTE', 'estado' => true]
        ]);
        
        
    }
}

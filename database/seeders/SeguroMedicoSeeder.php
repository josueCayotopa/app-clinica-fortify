<?php

namespace Database\Seeders;

use App\Models\SeguroMedico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeguroMedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seguros = [
            ['descripcion' => 'ESSALUD'],
            ['descripcion' => 'Seguro Privado']
        ];

        foreach ($seguros as $seguro) {
            SeguroMedico::create($seguro);
        }
    }
}

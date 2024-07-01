<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoBancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bancos = [
            'CENTRAL RESERVA DEL PERU',
            'DE CREDITO DEL PERU',
            'INTERNACIONAL DEL PERU',
            'LATINO',
            'CITIBANK DEL PERU S.A.',
            'STANDARD CHARTERED',
            'SCOTIABANK PERU',
            'CONTINENTAL',
            'DE LIMA',
            'MERCANTIL',
            'NACION',
            'SANTANDER CENTRAL HISPANO',
            'DE COMERCIO',
            'REPUBLICA',
            'NBK BANK',
            'BANCOSUR',
            'FINANCIERO DEL PERU',
            'DEL PROGRESO',
            'INTERAMERICANO FINANZAS',
            'BANEX',
            'NUEVO MUNDO',
            'SUDAMERICANO',
            'DEL LIBERTADOR',
            'DEL TRABAJO',
            'SOLVENTA',
            'SERBANCO SA.',
            'BANK OF BOSTON',
            'ORION',
            'DEL PAIS',
            'MI BANCO',
            'BNP PARIBAS',
            'AGROBANCO',
            'HSBC BANK PERU S.A.',
            'BANCO FALABELLA S.A.',
            'BANCO RIPLEY',
            'BANCO SANTANDER PERU S.A.',
            'BANCO AZTECA DEL PERU',
            'OTROS'
        ];

        // Inserta los datos en la tabla tipo_bancos
        foreach ($bancos as $banco) {
            DB::table('tipo_bancos')->insert([
                'descripcion' => $banco
            ]);
        }
    }
}

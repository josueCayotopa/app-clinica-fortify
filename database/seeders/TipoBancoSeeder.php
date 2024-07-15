<?php

namespace Database\Seeders;

use App\Models\TipoBanco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoBancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bancos = [
            'Banco de Crédito del Perú (BCP)',
            'Interbank',
            'BBVA Perú',
            'Scotiabank Perú',
            'Banco Pichincha',
            'BanBif',
            'Banco GNB',
            'Banco de Comercio',
            'Banco Interamericano de Finanzas (BanBif)',
            'Banco Santander Perú',
            'Citibank Perú',
            'Banco Azteca Perú',
            'Banco Ripley',
            'MiBanco',
            
        ];

        foreach ($bancos as $banco) {
            TipoBanco::create(['descripcion' => $banco]);
        }
    }
}

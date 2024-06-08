<?php

namespace Database\Seeders;

use App\Models\UIT;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['ano_proceso' => 1999, 'num_uit_deducible' => 7],
            ['ano_proceso' => 2000, 'num_uit_deducible' => 7],
            ['ano_proceso' => 2001, 'num_uit_deducible' => 7],
            ['ano_proceso' => 2002, 'num_uit_deducible' => 7],
            ['ano_proceso' => 2008, 'num_uit_deducible' => 7],
            ['ano_proceso' => 2009, 'num_uit_deducible' => 7],
            ['ano_proceso' => 2010, 'num_uit_deducible' => 7],
            ['ano_proceso' => 2011, 'num_uit_deducible' => 7],
            ['ano_proceso' => 2020, 'num_uit_deducible' => 7],
        ];

        foreach ($data as $item) {
            UIT::create($item);
        }
    }
}

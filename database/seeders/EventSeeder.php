<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events=[
            [

                'evento' => 'Luis Sanchez Trigoso',
                'fecha_inicio'=> '19-06-2024 08:00',
                'fecha_final'=> '21-06-2024 14:00', 
            ],

            [

                'evento' => 'Ana Maria Lopez Vargas',
                'fecha_inicio'=> '18-06-2024 08:00',
                'fecha_final'=> '22-06-2024 16:00', 
            ]

        ];

        foreach($events as $event){

            Event::create ($event);
        }
        

    }
}

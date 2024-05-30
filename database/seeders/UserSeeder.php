<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=User::create(
            [
            'name' => 'Admin',
            'email' => 'admin@admin.com', 
            'username' => 'admin', 
            'password' => bcrypt('verano2080'), 
            
        ],
        [
            'name' => 'Jorge Luis',
            'email' => '7144773621@untrm.edu.pe', 
            'username' => '7144773621', 
            'password' => bcrypt('12345678'),

        ],
        [
            'name' => 'Elias Culqui',
            'email' => '7565596221@untrm.edu.pe', 
            'username' => 'eliasculqui', 

            'password' => bcrypt('12348765'), 

        ]

    );
        $user->assignRole('admin');

    }
}

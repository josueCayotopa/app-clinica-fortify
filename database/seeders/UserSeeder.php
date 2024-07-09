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
    );
        $user->assignRole('admin');

    }
}

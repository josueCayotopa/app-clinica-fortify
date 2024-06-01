<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permisos que nuestra aplicacion tenga 
        $permissions=[
            'permission_index',
            'permission_create',
            'permission_edit',
            'permission_show',
            'permission_destroy',

            'role_index',
            'role_create',
            'role_edit',
            'role_show',
            'role_destroy',

            'user_index',
            'user_create',
            'user_edit',
            'user_show',
            'user_destroy',

            'empleado_index',
            'empleado_create',
            'empleado_edit',
            'empleado_show',
            'empleado_destroy',

            'contrato_index',
            'contrato_create',
            'contrato_edit',
            'contrato_show',
            'contrato_destroy',

        ];
        foreach ($permissions as $permission)
        {
            Permission::create([
                'name'=>$permission
            ]);
        }

    }
}

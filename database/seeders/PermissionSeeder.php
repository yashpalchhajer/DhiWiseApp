<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $permissions = [
            'create_medicine',
            'read_medicine',
            'update_medicine',
            'delete_medicine',
            'create_molecule',
            'read_molecule',
            'update_molecule',
            'delete_molecule',
            'create_manufacturer',
            'read_manufacturer',
            'update_manufacturer',
            'delete_manufacturer',
            'create_user',
            'read_user',
            'update_user',
            'delete_user',
            'manage_roles'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

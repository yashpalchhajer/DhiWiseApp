<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $input = [
            'System User',
            'User',
            'Admin',
        ];

        foreach ($input as $role) {
            Role::create([
                'name'      => $role,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DefaultUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return  void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $inputUser = [
            'username' => $faker->word,
            'name' => $faker->word,
            'is_active' => $faker->boolean(true),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
            'email' => 'whitney_damore42@yahoo.com',
            'password' => Hash::make('rEDhu9uGZ1obNB4'),
            'email_verified_at' => Carbon::now(),
            'user_type' => User::TYPE_USER
        ];

        $userUser  = User::create($inputUser);
        $roleUser  = Role::whereName('User')->first();
        $userUser->assignRole($roleUser);

        $inputAdmin = [
            'username' => $faker->word,
            'name' => $faker->word,
            'is_active' => $faker->boolean(true),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
            'email' => 'aryanna.becker55@gmail.com',
            'password' => Hash::make('XsbXjhsqNQbQaQV'),
            'email_verified_at' => Carbon::now(),
            'user_type' => User::TYPE_ADMIN
        ];

        $userAdmin  = User::create($inputAdmin);
        $roleAdmin  = Role::whereName('Admin')->first();
        $userAdmin->assignRole($roleAdmin);

        $roleSystemUser  = Role::whereName(User::DEFAULT_ROLE)->first();
        $inputSystemUser = [
            'name' => $faker->word,
            'is_active' => $faker->boolean(true),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
            'username' => 'antoinette.aufderhar',
            'email' => 'soreilly@gmail.com',
            'password' => Hash::make('Et+/T4WTS?'),
            'email_verified_at' => Carbon::now(),
            'user_type' => User::TYPE_ADMIN
        ];

        $systemUser = User::create($inputSystemUser);
        $systemUser->assignRole($roleSystemUser);

        $permissions = Permission::all();
        $roleSystemUser->givePermissionTo($permissions);
    }
}

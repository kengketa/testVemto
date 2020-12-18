<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = factory(App\Models\User::class, 1)->create([
            'email' => 'admin@admin.com',
            'password' => \Hash::make('admin'),
        ]);

        //$this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        //$this->call(PermissionSeeder::class);
    }
}

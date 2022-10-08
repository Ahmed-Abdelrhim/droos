<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::create([
            'name' => 'Ahmed Abdelrhim',
            'email' => 'abdelrhim.admin@gmail.com',
            'phone_number' => '01152067271',
            'password' => '$2y$10$Ijp7tZK3xDjD2lOHd1LZMuOCskHTvA6sesI.XaZJpyqX/O1Bcmbsm',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Admin::create([
            'name' => 'Aladdin Muhammed',
            'email' => 'aladdin.admin@gmail.com',
            'phone_number' => '01023435023',
            'password' => '$2y$10$Ijp7tZK3xDjD2lOHd1LZMuOCskHTvA6sesI.XaZJpyqX/O1Bcmbsm',
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        Admin::create([
            'name' => 'Anas Rabea',
            'email' => 'aladdin.admin@gmail.com',
            'phone_number' => '01014012312',
            'password' => '$2y$10$Ijp7tZK3xDjD2lOHd1LZMuOCskHTvA6sesI.XaZJpyqX/O1Bcmbsm',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\Constant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create Admin User
        User::create([
            'name' => 'Administartor',
            'email' => 'admin@admin.com',
            'password'  => '12345678',
            'username'  => 'admin',
            'last_activity'  => now(),
            'avatar'  => null,
            'super_admin'  => 1,
        ]);
    }
}

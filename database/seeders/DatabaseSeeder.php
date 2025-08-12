<?php

namespace Database\Seeders;

use App\Models\Constant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'username'              => 'admin',
            'first_name'            => 'Administrator',
            'last_name'             => null,
            'email'                 => 'admin@admin.com',
            'mobile'                => null,
            'login_type'            => null,
            'file_url'              => null,
            'gender'                => null,
            'date_of_birth'         => null,
            'email_verified_at'     => now(),
            'password'              => Hash::make('12345678'),
            'is_banned'             => 0,
            'is_subscribe'          => 0,
            'status'                => 1,
            'last_notification_seen' => now(),
            'address'               => null,
            'user_type'              => 'admin',
            'pin'                   => null,
            'otp'                   => null,
            'is_parental_lock_enable' => 0,
            'remember_token'        => null,
            'father_code'           => null,
        ]);
    }
}

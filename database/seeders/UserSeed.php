<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'phone' => '9876543210',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Simple User
        User::create([
            'name' => 'Simple User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'phone' => '9876543211',
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
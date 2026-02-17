<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => env('ADMIN_EMAIL', 'admin@agency.com'),
            'password' => Hash::make(env('ADMIN_PASSWORD', 'password123')),
            'role' => 'admin',
        ]);
    }
}
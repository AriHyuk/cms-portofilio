<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('Admin123'), // ganti sesuai kebutuhan
                'email_verified_at' => now(),
                'remember_token' => Str::random(60),
            ]
        );
    }
}


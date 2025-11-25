<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User biasa
        User::factory()->create([
            'name' => 'User Test',
            'email' => 'user@test.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        // Penjual
        User::factory()->create([
            'name' => 'Penjual Test',
            'email' => 'penjual@test.com',
            'password' => bcrypt('password'),
            'role' => 'penjual',
        ]);

        // Admin
        User::factory()->create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    }
}

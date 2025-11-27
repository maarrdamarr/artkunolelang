<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User biasa
        User::updateOrCreate(['email' => 'user@test.com'], [
            'name' => 'User Test',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        // Penjual
        User::updateOrCreate(['email' => 'penjual@test.com'], [
            'name' => 'Penjual Test',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'penjual',
        ]);

        // Admin
        User::updateOrCreate(['email' => 'admin@test.com'], [
            'name' => 'Admin Test',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $this->call([
            AddLandingSectionsSeeder::class,
            AddTestItemsSeeder::class,
        ]);
    }
}

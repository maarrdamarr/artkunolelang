<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddTestItemsSeeder extends Seeder
{
    public function run(): void
    {
        $seller = User::where('email', 'penjual@test.com')->first();
        if (!$seller) {
            $seller = User::factory()->create([
                'name' => 'Penjual Test',
                'email' => 'penjual@test.com',
                'password' => bcrypt('password'),
                'role' => 'penjual'
            ]);
        }

        Item::firstOrCreate([
            'name' => 'Patung Ratu Kuno',
        ], [
            'user_id' => $seller->id,
            'category' => 'Patung',
            'description' => 'Patung antik dari abad ke-18',
            'start_price' => 500000,
            'status' => 'pending',
        ]);

        Item::firstOrCreate([
            'name' => 'Wayang Kulit Antik',
        ], [
            'user_id' => $seller->id,
            'category' => 'Wayang',
            'description' => 'Wayang kulit tradisional',
            'start_price' => 300000,
            'status' => 'pending',
        ]);
    }
}

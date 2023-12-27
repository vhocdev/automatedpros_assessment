<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::create([
            'name' => 'Sample Restaurant',
            'location' => '123 Main Street',
            'email' => 'victor.infodev@gmail.com',
            'user_id' => 1 // the only one
        ]);

        Restaurant::create([
            'name' => 'Restaurant Two',
            'location' => '456 Oak Avenue',
            'email' => 'email@gmail.com',
            'user_id' => 1 // the only one
        ]);

        Restaurant::create([
            'name' => 'Restaurant Three',
            'location' => '789 Maple Lane',
            'email' => 'victor.infodev@gmail.com',
            'user_id' => 1, // the only one
            'status' => 'inactive'
        ]);
    }
}

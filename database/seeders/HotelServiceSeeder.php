<?php

namespace Database\Seeders;

use App\Models\HotelService;
use Illuminate\Database\Seeder;

class HotelServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['name' => 'Extra Bed',        'price' => 150000],
            ['name' => 'Breakfast',        'price' => 75000],
            ['name' => 'Airport Transfer', 'price' => 200000],
            ['name' => 'Laundry',          'price' => 50000],
            ['name' => 'Room Decoration',  'price' => 300000],
        ];

        foreach ($services as $service) {
            HotelService::create($service);
        }
    }
}
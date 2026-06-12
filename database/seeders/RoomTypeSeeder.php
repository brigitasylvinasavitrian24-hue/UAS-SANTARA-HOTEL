<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'Standard', 'description' => 'Kamar standar dengan fasilitas lengkap.', 'capacity' => 2],
            ['name' => 'Deluxe',   'description' => 'Kamar deluxe dengan pemandangan taman.', 'capacity' => 2],
            ['name' => 'Superior', 'description' => 'Kamar superior dengan ruang lebih luas.', 'capacity' => 3],
            ['name' => 'Suite',    'description' => 'Kamar suite mewah dengan ruang tamu terpisah.', 'capacity' => 4],
            ['name' => 'Family',   'description' => 'Kamar keluarga dengan tempat tidur ekstra.', 'capacity' => 4],
        ];

        foreach ($types as $type) {
            RoomType::create($type);
        }
    }
}
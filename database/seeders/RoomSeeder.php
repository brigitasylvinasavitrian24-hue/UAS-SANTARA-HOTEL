<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            ['room_number' => '101', 'type' => 'Standard', 'price' => 350000],
            ['room_number' => '102', 'type' => 'Standard', 'price' => 350000],
            ['room_number' => '103', 'type' => 'Standard', 'price' => 350000],
            ['room_number' => '201', 'type' => 'Deluxe',   'price' => 550000],
            ['room_number' => '202', 'type' => 'Deluxe',   'price' => 550000],
            ['room_number' => '203', 'type' => 'Superior', 'price' => 750000],
            ['room_number' => '204', 'type' => 'Superior', 'price' => 750000],
            ['room_number' => '301', 'type' => 'Suite',    'price' => 1200000],
            ['room_number' => '302', 'type' => 'Suite',    'price' => 1200000],
            ['room_number' => '303', 'type' => 'Family',   'price' => 1500000],
        ];

        foreach ($rooms as $room) {
            $type = RoomType::where('name', $room['type'])->first();
            Room::create([
                'room_number'  => $room['room_number'],
                'room_type_id' => $type->id,
                'price'        => $room['price'],
                'status'       => 'available',
            ]);
        }
    }
}
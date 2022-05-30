<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::truncate();

        $rooms = [
            [
                'name' => 'Silver',
                'price' => '250000',
                'status' => 'Disewakan',
                'image1' => 'rooms_silver_1.webp',
                'image2' => 'rooms_silver_2.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gold',
                'price' => '400000',
                'status' => 'Disewakan',
                'image1' => 'rooms_gold_1.webp',
                'image2' => 'rooms_gold_2.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Platinum',
                'price' => '550000',
                'status' => 'Disewakan',
                'image1' => 'rooms_platinum_1.webp',
                'image2' => 'rooms_platinum_2.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ];
        
        Room::insert($rooms);
    }
}

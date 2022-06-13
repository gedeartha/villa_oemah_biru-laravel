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
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting",
                'image1' => 'rooms_silver_1.webp',
                'image2' => 'rooms_silver_2.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gold',
                'price' => '400000',
                'status' => 'Disewakan',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting",
                'image1' => 'rooms_gold_1.webp',
                'image2' => 'rooms_gold_2.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Platinum',
                'price' => '550000',
                'status' => 'Disewakan',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting",
                'image1' => 'rooms_platinum_1.webp',
                'image2' => 'rooms_platinum_2.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ];
        
        Room::insert($rooms);
    }
}

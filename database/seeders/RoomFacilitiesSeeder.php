<?php

namespace Database\Seeders;

use App\Models\Facilities;
use App\Models\RoomFacilities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomFacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomFacilities::truncate();

        $facilities = [
            [
                'room_id' => '1',
                'facilities_id' => '2',
            ],
            [
                'room_id' => '1',
                'facilities_id' => '3',
            ],
            [
                'room_id' => '1',
                'facilities_id' => '4',
            ],
            [
                'room_id' => '2',
                'facilities_id' => '1',
            ],
            [
                'room_id' => '2',
                'facilities_id' => '2',
            ],
            [
                'room_id' => '2',
                'facilities_id' => '3',
            ],
            [
                'room_id' => '2',
                'facilities_id' => '4',
            ],
            [
                'room_id' => '3',
                'facilities_id' => '1',
            ],
            [
                'room_id' => '3',
                'facilities_id' => '2',
            ],
            [
                'room_id' => '3',
                'facilities_id' => '3',
            ],
            [
                'room_id' => '3',
                'facilities_id' => '4',
            ],
            [
                'room_id' => '3',
                'facilities_id' => '5',
            ],
            ];
        
            RoomFacilities::insert($facilities);
    }
}

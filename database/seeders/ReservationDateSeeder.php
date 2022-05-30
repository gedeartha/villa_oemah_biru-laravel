<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\ReservationDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationDate::truncate();

        $reservationDate = [
            [
                'reservation_id' => '1',
                'room_id' => '2',
                'reservation_date' => '2022/05/25',
            ],
            [
                'reservation_id' => '1',
                'room_id' => '2',
                'reservation_date' => '2022/05/26',
            ],
            [
                'reservation_id' => '1',
                'room_id' => '2',
                'reservation_date' => '2022/05/27',
            ],
        ];
        
        ReservationDate::insert($reservationDate);
    }
}

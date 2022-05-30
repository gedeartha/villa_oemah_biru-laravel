<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::truncate();

        $reservations = [
            [
                'created_at' => now(),
                'updated_at' => now(),
                'room_id' => '2',
                'check_in' => '2022/05/25',
                'check_out' => '2022/05/27',
                'user_id' => '1',
                'adult' => '2',
                'child' => '0',
                'total' => '1100000',
                'status' => 'Sudah Dibayar',
                'proof' => 'receipt.jpg',
            ],
            ];
        
            Reservation::insert($reservations);
    }
}

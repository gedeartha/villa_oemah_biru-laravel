<?php

namespace Database\Seeders;

use App\Models\ReservationDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(VillaSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FacilitiesSeeder::class);
        $this->call(RoomFacilitiesSeeder::class);
        $this->call(ReservationDateSeeder::class);
        $this->call(AddOnSeeder::class);
    }
}

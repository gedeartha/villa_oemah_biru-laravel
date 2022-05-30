<?php

namespace Database\Seeders;

use App\Models\Facilities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facilities::truncate();

        $facilities = [
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'AC',
                'status' => 'Aktif',
                'icon' => 'ac.svg',
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'Free WIFI',
                'status' => 'Aktif',
                'icon' => 'wifi.svg',
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => '24 Jam Room Service',
                'status' => 'Aktif',
                'icon' => '24h.svg',
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => '2 Tempat Tidur',
                'status' => 'Aktif',
                'icon' => 'bed.svg',
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'Breakfast',
                'status' => 'Aktif',
                'icon' => 'breakfast.svg',
            ],
            ];
        
            Facilities::insert($facilities);
    }
}

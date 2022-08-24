<?php

namespace Database\Seeders;

use App\Models\AddOn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddOnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AddOn::truncate();
        
        $addons = [
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'Extra Bed',
                'price' => '125000',
                'status' => 'Aktif',
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'Selimut Extra',
                'price' => '55000',
                'status' => 'Aktif',
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'Handuk Extra',
                'price' => '35000',
                'status' => 'Aktif',
            ],
            ];
        
            AddOn::insert($addons);
    }
}

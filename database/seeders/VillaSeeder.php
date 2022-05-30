<?php

namespace Database\Seeders;

use App\Models\Villa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Villa::truncate();

        $villas = [
            [
                'name' => 'Villa Oemah Biru Bali',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'tagline' => "Experience nature in its purest form, while enjoying attention to detail, indulgent pampering and exceptional cuisine.",
                'address' => "Jalan Ungasan, Kuta Selatan, Badung, Bali",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ];
        
        Villa::insert($villas);
    }
}

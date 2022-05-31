<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();

        $admins = [
            [
                'name' => 'Owner',
                'email' => 'owner@villa-oemah-biru.com',
                'password' => 'asd',
                'status' => 'Aktif',
                'role' => 'owner',
                'avatar' => 'owner.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bagus',
                'email' => 'bagus@villa-oemah-biru.com',
                'password' => 'asd',
                'status' => 'Aktif',
                'role' => 'admin',
                'avatar' => 'admin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bayu',
                'email' => 'bayu@villa-oemah-biru.com',
                'password' => 'asd',
                'status' => 'Tidak Aktif',
                'role' => 'admin',
                'avatar' => 'admin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gede',
                'email' => 'gede@villa-oemah-biru.com',
                'password' => 'asd',
                'status' => 'Aktif',
                'role' => 'admin',
                'avatar' => 'admin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        Admin::insert($admins);
    }
}

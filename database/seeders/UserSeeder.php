<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $users = [
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'Gede Artha Aditya',
                'email' => 'artha@villa-oemah-biru.com',
                'phone' => '081246000123',
                'password' => 'asd',
                'status' => 'Aktif',
                'avatar' => 'user.jpg',
            ],
        ];
        
        User::insert($users);
    }
}

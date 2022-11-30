<?php

namespace Database\Seeders;

use App\Constant\Constant;
use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'uuid' => Str::uuid(),
                'user_id' => Constant::STATUS_ONE,
                'email' => 'anurag@laravel.demo',
                'first_name' => 'Anurag',
                'last_name' => 'Trivedi',
                'password' => Hash::make('Test@123'),
                'dob' => '1996-12-21',
                'status' => Constant::STATUS_ONE
            ],
            [
                'uuid' => Str::uuid(),
                'user_id' => Constant::STATUS_TWO,
                'email' => 'rahul@laravel.demo',
                'first_name' => 'Rahul',
                'last_name' => 'Patel',
                'password' => Hash::make('Test@123'),
                'dob' => '1990-11-01',
                'status' => Constant::STATUS_ONE
            ],
            [
                'uuid' => Str::uuid(),
                'user_id' => Constant::STATUS_THREE,
                'email' => 'rohit@laravel.demo',
                'first_name' => 'Rohit',
                'last_name' => 'Jain',
                'password' => Hash::make('Test@123'),
                'dob' => '1986-06-20',
                'status' => Constant::STATUS_ONE
            ],
            [
                'uuid' => Str::uuid(),
                'user_id' => Constant::STATUS_FOUR,
                'email' => 'vishal@laravel.demo',
                'first_name' => 'Vishal',
                'last_name' => 'Sheth',
                'password' => Hash::make('Test@123'),
                'dob' => '1992-11-11',
                'status' => Constant::STATUS_ONE
            ],
            [
                'uuid' => Str::uuid(),
                'user_id' => Constant::STATUS_FIVE,
                'email' => 'ruchit@laravel.demo',
                'first_name' => 'Ruchit',
                'last_name' => 'Patel',
                'password' => Hash::make('Test@123'),
                'dob' => '1993-04-21',
                'status' => Constant::STATUS_ONE
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate([
                'email' => $user['email'],
            ], [
                'uuid' => $user['uuid'],
                'user_id' => $user['user_id'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'password' => $user['password'],
                'dob' => $user['dob'],
                'status' => $user['status'],
            ]);
        }
    }
}

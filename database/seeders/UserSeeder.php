<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = "123456789";
        $userArray = [
            [
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make($password)
            ],
            [
                'name' => 'Employee',
                'email' => 'employee@test.com',
                'password' => Hash::make($password)
            ],
            [
                'name' => 'Store Executive',
                'email' => 'store-executive@test.com',
                'password' => Hash::make($password)
            ]
        ];
        DB::table('users')->insert($userArray);
    }
}

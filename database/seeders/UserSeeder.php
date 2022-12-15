<?php

namespace Database\Seeders;

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
        $users = [
            [
                'name' => 'My Name',
                'email' => 'superadmin@gmail.com',
                'password' =>     bcrypt('12345678'),
                'role' => 1
            ],
            [
                'name' => 'My Dockter',
                'email' => 'dokter@gmail.com',
                'password' =>     bcrypt('12345678'),
                'role' => 1
            ],
            [
                'name' => 'My Admin',
                'email' => 'admin@gmail.com',
                'password' =>     bcrypt('12345678'),
                'role' => 1
            ],
        ];
        foreach ($users as $user) {
            \DB::table('users')->insert($user);
        }
    }
}

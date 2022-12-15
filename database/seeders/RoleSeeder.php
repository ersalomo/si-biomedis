<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'role' => 'superadmin'
            ],
            [
                'role' => 'admin'
            ],
            [
                'role' => 'dokter'
            ],
        ];
        foreach ($roles as $role) {
            \App\Models\Role::insert($role);
        }
    }
}

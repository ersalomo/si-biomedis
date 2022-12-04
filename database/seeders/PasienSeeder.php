<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RegistrasiPasien;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // uuid
    // nama
    // jenis_pasien
    // tanggal_lahir
    // umur
    // jenis_kelamin
    // alamat
    // pekerjaan
    // created_at
    // updated_at
    public function run()
    {
        foreach (range(1, 1000) as $i) {
            RegistrasiPasien::create([
                'nama' => fake()->name,
                'jenis_pasien' => fake()->randomElement(['umum', 'bpjs']),
                'tanggal_lahir' => fake()->date,
                'umur' => fake()->numberBetween(2, 100),
                'jenis_kelamin' => fake()->randomElement(['pria', 'wanita']),
                'alamat' => fake()->address(),
                'pekerjaan' => fake()->jobTitle(),
                'created_at' => fake()->dateTimeThisYear()->format('Y-m-d'),
                'updated_at' => fake()->dateTimeThisYear()->format('Y-m-d'),
            ]);
        }
    }
}

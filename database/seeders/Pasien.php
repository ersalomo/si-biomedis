<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as F;

class Pasien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f  = F::create('id_ID');
        $d = fake('id_ID');
        foreach (range(1, 100) as $value) {
            $data = [
                'uuid' => fake()->uuid(),
                'nama' => $f->name(),
                'tanggal_lahir' => $d->date(),
                'umur' => fake()->numberBetween(10, 90),
                'jenis_kelamin' => $d->randomElement(['pria', 'wanita']),
                'alamat' => $d->words(10, 1),
                'pekerjaan' => $d->jobTitle(),
            ];
            DB::table('registrasi_pasiens')->insert($data);
        }
    }
}

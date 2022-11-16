<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\RegistrasiPasien;

class Anamnesa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $uuid_pasien = RegistrasiPasien::pluck('uuid')->toArray();

        foreach (range(1, 100) as $value) {
            $data = [
                'uuid_pasien' => fake()->randomElement($uuid_pasien),
                'anamnesa' => fake()->sentence(),
                'diagnosa' => fake()->sentence(),
                'pengobatan' => fake()->sentence(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            DB::table('anamnesa_pasiens')->insert($data);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            siswa::create([
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tanggal_lahir' => $faker->date('Y-m-d', '-15 years'),
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
                'kelas' => $faker->randomElement(['X', 'XI', 'XII']),
                'jurusan' => $faker->randomElement(['IPA', 'IPS']),
                'foto' => null,
                'catatan' => $faker->sentence,
            ]);
        }
    }
}

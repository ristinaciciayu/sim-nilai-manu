<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    protected $model = \App\Models\Siswa::class;

    public function definition()
    {
        return [
            'nis' => $this->faker->unique()->numerify('2025####'),
            'nama_siswa' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'kelas' => $this->faker->randomElement(['X IPA 1','X IPA 2','XI IPA 1','XI IPS 1']),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki','Perempuan']),
            'no_tlpn' => $this->faker->e164PhoneNumber(),
        ];
    }
}

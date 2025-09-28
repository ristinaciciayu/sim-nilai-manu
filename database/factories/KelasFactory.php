<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    protected $model = \App\Models\Kelas::class;

    public function definition()
    {
        return [
            'kelas' => $this->faker->randomElement(['X IPA 1', 'X IPA 2', 'XI IPS 1', 'XI IPA 1']),
            'nip' => $this->faker->numerify('19########'),
            'nama_walikelas' => $this->faker->name(),
            'jumlah_siswa' => $this->faker->numberBetween(20, 36),
        ];
    }
}

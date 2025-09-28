<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    protected $model = \App\Models\Guru::class;

    public function definition()
    {
        return [
            'nip' => $this->faker->unique()->numerify('19########'),
            'nama' => $this->faker->name(),
            'jenkel' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tgl_lahir' => $this->faker->date('Y-m-d'),
            'alamat' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'no_telp' => $this->faker->e164PhoneNumber(),
            'status' => $this->faker->randomElement(['Aktif', 'Nonaktif']),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MapelFactory extends Factory
{
    protected $model = \App\Models\Mapel::class;

    public function definition()
    {
        return [
            'nama_mapel' => $this->faker->randomElement(['Matematika', 'IPA', 'IPS', 'Bahasa Indonesia', 'Bahasa Inggris']),
            'kkm' => $this->faker->numberBetween(65, 80),
            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiFactory extends Factory
{
    protected $model = \App\Models\Nilai::class;

    public function definition()
    {
        return [
            'nis' => $this->faker->unique()->numerify('2025####'),
            'nama_siswa' => $this->faker->name(),
            'kelas' => $this->faker->randomElement(['X IPA 1','X IPA 2','XI IPA 1']),
            'mapel' => $this->faker->randomElement(['Matematika','IPA','IPS','Bahasa Indonesia']),
            'tugas' => $this->faker->numberBetween(60,100),
            'pts' => $this->faker->numberBetween(60,100),
            'pas' => $this->faker->numberBetween(60,100),
            // gunakan atribut lain untuk menghitung nilai_akhir
            'nilai_akhir' => function(array $attributes) {
                return (int) round( ($attributes['tugas'] + $attributes['pts'] + $attributes['pas']) / 3 );
            },
        ];
    }
}

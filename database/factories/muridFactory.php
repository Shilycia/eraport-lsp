<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\murid>
 */
class muridFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numerify('#######'),
            'nama_siswa' => $this->faker->name(),
            'kelas_id' => $this->faker->randomElement(['12 RPL 1', '12 RPL 2']),
            'password' => bcrypt('password'),
        ];
    }
}

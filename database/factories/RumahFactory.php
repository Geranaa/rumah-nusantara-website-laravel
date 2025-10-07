<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rumah>
 */
class RumahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'=>fake()->text(90),
            'subNama'=>fake()->text(40),
            'harga'=>fake()->numberBetween(1000000, 9999999),
            'deskripsi'=>fake()->text(200),
            'label'=>fake()->randomElement(['Tersedia', 'Sudah Terjual']),
            'luas'=>fake()->randomNumber(),
            'kamarTidur'=>fake()->randomNumber(),
            'kamarMandi'=>fake()->randomNumber(),
            'garasi'=>fake()->randomNumber(),
            'video'=>fake()->text(10),
            'foto'=>fake()->text(10),
            'deskripsiLanjutan'=>fake()->text(50),
            'fotoDenah'=>fake()->text(10),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name' => fake('id_ID')->name(),
            'nis' => fake()->unique()->numberBetween(100000, 999999),
            'gender' => fake()->numberBetween(0, 1),
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) {
            Student::create([
                'name' => fake()->name(),
                'nis' => fake()->numberBetween(100000, 999999),
                'gender' => fake()->numberBetween(0, 1),
                'classroom_id' => fake()->numberBetween(1, 15),
                // 'attendance_id' => null
            ]);
        }
    }
}

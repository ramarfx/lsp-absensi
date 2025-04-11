<?php

namespace Database\Seeders;

use App\Models\Classroom;
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
        $classrooms = Classroom::all();

        foreach ($classrooms as $classroom) {
            Student::factory()->count(fake()->numberBetween(10, 20))->create([
                'classroom_id' => $classroom->id,
            ]);
        }
    }
}

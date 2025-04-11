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
        $this->seedStudentsFromFile('xii_dkv.php', 'XII-DKV');
        $this->seedStudentsFromFile('xii_rpl.php', 'XII-RPL');
    }

    protected function seedStudentsFromFile(string $filename, string $classroomName): void
    {
        $names = include database_path("data/{$filename}");

        $classroom = Classroom::where('name', $classroomName)->first();

        if (!$classroom) {
            $this->command->error("Classroom '{$classroomName}' not found.");
            return;
        }

        foreach ($names as $name) {
            $name = $this->normalizeName($name);
            Student::create([
                'name' => $name,
                'nis' => fake()->unique()->numberBetween(100000, 999999),
                'gender' => fake()->numberBetween(0, 1), // bisa diganti logika tebakan
                'classroom_id' => $classroom->id,
            ]);
        }

        $this->command->info("Seeded " . count($names) . " students for classroom '{$classroomName}'.");
    }

    protected function normalizeName(string $name): string
    {
        return collect(explode(' ', strtolower($name)))
            ->map(fn($word) => ucfirst($word))
            ->implode(' ');
    }
}

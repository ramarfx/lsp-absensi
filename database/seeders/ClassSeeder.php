<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $class = ['I', 'II', 'III'];
        $jurusan = ['RPL', 'DKV', 'AKL', 'OTKP', 'BDP'];

        for ($i=0; $i < count($jurusan); $i++) {
            for ($j=0; $j < count($class); $j++) {
                Classroom::create([
                    'name' => "$class[$j]-$jurusan[$i]"
                ]);
            }
        }
    }
}

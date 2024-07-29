<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory()
        ->count(20)
        ->female()
        ->forCourse()
        ->create();

        Student::factory()
        ->count(40)
        ->male()
        ->forCourse()
        ->create(); 
        //
    }
}

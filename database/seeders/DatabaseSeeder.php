<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 20 subjects
        $this->call(SubjectSeeder::class);

        // 50 students
        $this->call(StudentSeeder::class);

        $subjects = Subject::all();
        $students = Student::all();

        // к каждому студенту привязываем от 8 до 10 предметов
        $students->each(function ($student) use ($subjects) {
           $student->subjects()->attach(
               $subjects->random(rand(8, 10))->pluck('id')->toArray()
           );
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Group;
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
        // 10 groups
        $this->call(GroupSeeder::class);

        // 20 subjects
        $this->call(SubjectSeeder::class);

        // 50 students
        $this->call(StudentSeeder::class);

        $subjects = Subject::all();
//        $groups = Group::all();
        $students = Student::all();

        $students->each(function ($student) use ($subjects) {
           $student->subjects()->attach(
               $subjects->random(rand(7, 10))->pluck('id')->toArray()
           );
        });
    }
}

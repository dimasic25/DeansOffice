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

        // 50 students
        $this->call(StudentSeeder::class);

        // 20 subjects
        $this->call(SubjectSeeder::class);

        $subjects = Subject::all();
        $groups = Group::all();
        $students = Student::all();

        // к каждой группе привязываем от 10 до 20 студентов
        $groups->each(function ($group) use ($students) {
            $group->students()->attach(
                $students->random(rand(10, 20))->pluck('id')->toArray()
            );
        });

        // к каждому предмету привязываем 30 студентов
        $subjects->each(function ($subject) use ($students) {
           $subject->students()->attach(
               $students->random(30)->pluck('id')->toArray()
           );
        });
    }
}

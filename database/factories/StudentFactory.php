<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $group = Group::create([
            'name' => $this->faker->realText(20),
            'year' => $this->faker->year(2021),
        ]);
        return [
            'name' => $this->faker->name,
            'date_birth' => $this->faker->date(),
            'group_id' => $group->id,
        ];
    }
}

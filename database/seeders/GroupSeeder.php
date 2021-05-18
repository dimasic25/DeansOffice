<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::factory(10)->create();
    }
}

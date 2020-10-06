<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'start' => '2020-10-06 10:30:00',
            'duration' => '03:45:12',
            'taskType' => 'work',
            'description' => 'This is a description.',
            'user_id' => 1
        ]);
    }
}

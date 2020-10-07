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
            [
                'start' => '2020-10-06 10:30:00',
                'duration' => '01:45:12',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-10-06 10:30:00',
                'duration' => '02:45:12',
                'task_type_id' => 2,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-10-06 10:30:00',
                'duration' => '03:45:12',
                'task_type_id' => 2,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-10-06 10:30:00',
                'duration' => '04:45:12',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-10-06 10:30:00',
                'duration' => '05:45:12',
                'task_type_id' => 2,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-10-06 10:30:00',
                'duration' => '06:45:12',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-10-06 10:30:00',
                'duration' => '07:45:12',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-10-06 10:30:00',
                'duration' => '08:45:12',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-10-06 10:30:00',
                'duration' => '09:45:12',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-10-06 10:30:00',
                'duration' => '10:45:12',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ]
        ]);
    }
}

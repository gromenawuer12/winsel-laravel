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
                'start' => '2020-01-06 10:30:00',
                'duration' => '00:31:12',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-02-11 20:11:17',
                'duration' => '01:55:01',
                'task_type_id' => 2,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-03-16 07:02:43',
                'duration' => '00:45:24',
                'task_type_id' => 2,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-03-06 18:04:56',
                'duration' => '01:45:12',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-04-09 23:21:31',
                'duration' => '05:25:18',
                'task_type_id' => 2,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-07-06 12:46:51',
                'duration' => '01:31:23',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-07-23 12:08:43',
                'duration' => '02:12:12',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-08-28 06:15:22',
                'duration' => '08:45:02',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-10-06 16:50:18',
                'duration' => '03:32:00',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ], [
                'start' => '2020-10-07 11:34:21',
                'duration' => '00:43:48',
                'task_type_id' => 1,
                'description' => 'This is a description.',
                'user_id' => 1
            ]
        ]);
    }
}

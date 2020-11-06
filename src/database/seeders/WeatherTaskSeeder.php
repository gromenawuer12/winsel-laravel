<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeatherTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weather_tasks')->insert([

            ['weather' => 'Clear'],
            ['weather' => 'Thunderstorm'],
            ['weather' => 'Drizzle'],
            ['weather' => 'Rain'],
            ['weather' => 'Snow'],
            ['weather' => 'Atmosphere'],
            ['weather' => 'Clouds'],

        ]);
    }
}

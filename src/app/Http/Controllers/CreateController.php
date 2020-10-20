<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TaskRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Models\WeatherTask;

class CreateController extends Controller
{
    public function __invoke(TaskRequest $request)
    {
        $validated = $request->validated();
        $weather = null;

        if (Carbon::now()->addDays(5)->gte(Carbon::parse($validated['start']))) {
            $response = Http::get(env('WEATHER_URL'));
            if ($response->successful()) {

                $response = $response->json();

                $i = 0;

                while ($i < count($response['list']) - 1) {
                    if (
                        strtotime($validated['start']) >= $response['list'][$i]['dt'] &&
                        strtotime($validated['start']) < $response['list'][$i + 1]['dt']
                    ) {
                        $weather = $response['list'][$i]['weather'][0]['main'];
                        $i = count($response['list']);
                    }
                    $i++;
                }
                $weather = WeatherTask::weatherId($weather);
            }
        }

        DB::table('tasks')->insert([
            'start' => $validated['start'],
            'duration' => $validated['duration'],
            'task_type_id' => $validated['taskType'],
            'description' => $validated['description'],
            'user_id' => Auth::id(),
            'weather_task_id' => $weather,
        ]);

        return redirect('/');
    }
}

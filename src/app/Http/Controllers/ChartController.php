<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function __invoke(Request $request)
    {
        $now = Carbon::now();
        $chart = [];

        if (!empty($request->input('year')) && !empty($request->input('month'))) {
            $query = Task::durationWeather($request->input('year'), $request->input('month'))->get();
        } else {
            $query = Task::durationWeather($now->year, $now->month)->get();
        }

        if (!$query->isEmpty()) {
            foreach ($query as $value) {
                $chart[] = [$value->taskType->name, (int)$value->time];
            }
        }
        return view('tasks.chart', ['chart' => json_encode($chart)]);
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Task;

class ScheduleController extends Controller
{
    public function __invoke(Request $request)
    {
        $date = '';
        $next = '';
        $previous = '';

        if ($request->only(['previous', 'search', 'next'])) {
            $action = $request->only(['previous', 'search', 'next']);
            $index = array_keys($action);

            $date = Carbon::parse($action[$index[0]]);
            $next = $date->copy()->addDay();
            $previous = $date->copy()->subDay();
        } else {
            $date = Carbon::now();
            $next = $date->addDay();
            $previous = $date->subDay();
        }
        return view('tasks.schedule', ['taskList' => Task::betweenDates($date->format('Y-m-d'))->get(), 'dates' => [$previous->format('Y-m-d'), $date->format('Y-m-d'), $next->format('Y-m-d')]]);
    }
}

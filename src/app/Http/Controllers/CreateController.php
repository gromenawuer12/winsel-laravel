<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TaskRequest;

class CreateController extends Controller
{
    public function __invoke(TaskRequest $request)
    {
        $validated = $request->validated();

        DB::table('tasks')->insert([
            'start' => $validated['start'],
            'duration' => $validated['duration'],
            'task_type_id' => $validated['taskType'],
            'description' => $validated['description'],
            'user_id' => Auth::id(),
        ]);

        return redirect('/');
    }
}

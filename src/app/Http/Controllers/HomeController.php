<?php

namespace App\Http\Controllers;

use App\Models\Task;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', ['taskList' => Task::tasks()->get()]);
    }
}

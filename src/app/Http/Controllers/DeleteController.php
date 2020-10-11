<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke()
    {
        DB::table('tasks')->where('id', '=', $_GET['task'])->delete();
        return redirect('/');
    }
}

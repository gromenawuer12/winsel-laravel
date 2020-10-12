<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Request $request)
    {
        DB::table('tasks')->where('id', '=', $request->input('task'))->delete();
        return redirect('/');
    }
}

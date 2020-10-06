<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __invoke(LoginRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt(['name' => $validated['username'], 'password' => $validated['password']])) {
            // Authentication passed...
            return redirect()->intended('home');
        } else {
            return redirect()->intended('login');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __invoke(LoginRequest $request)
    {
        $validated = $request->validated();

        $credentials = $request->only('username', 'password');

        if (Auth::attempt(['name' => $credentials['username'], 'password' => $credentials['password']])) {
            // Authentication passed...
            return redirect()->intended('home');
        } else {
            return redirect()->intended('login');
        }
    }
}

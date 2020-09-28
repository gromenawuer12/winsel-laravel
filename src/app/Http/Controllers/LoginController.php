<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    public function __invoke()
    {
        dd($_POST);
    }
    */
    public function authenticate(LoginRequest $request)
    {
        $validated = $request->validated();

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }
        else{
            return redirect()->intended('login');
        }
    }

}
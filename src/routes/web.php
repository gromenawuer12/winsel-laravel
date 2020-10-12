<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/login', 'login')->name('login');

Route::post('/loginController', LoginController::class);

Route::get('/logout', LogoutController::class);

Route::get('/', HomeController::class)->middleware('auth');

Route::view('/create', 'tasks.create')->name('create')->middleware('auth');

Route::post('/createController', CreateController::class)->middleware('auth');

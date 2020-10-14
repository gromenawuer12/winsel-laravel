<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\DeleteController;

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

Route::view('/tasks/create', 'tasks.create')->middleware('auth');

Route::post('/tasks', CreateController::class)->name('create')->middleware('auth');

Route::delete('/tasks', DeleteController::class)->name('delete')->middleware('auth');

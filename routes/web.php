<?php

use App\Http\Controllers\Day1Controller;
use App\Http\Controllers\Day2Controller;
use App\Http\Controllers\Day3Controller;
use App\Http\Controllers\DayController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/day/{day}', DayController::class)->name('day');

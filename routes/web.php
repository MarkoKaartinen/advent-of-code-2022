<?php

use App\Http\Controllers\Day1Controller;
use App\Http\Controllers\Day2Controller;
use App\Http\Controllers\Day3Controller;
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

Route::get('/day/1', Day1Controller::class)->name('day1');
Route::get('/day/2', Day2Controller::class)->name('day2');
Route::get('/day/3', Day3Controller::class)->name('day3');

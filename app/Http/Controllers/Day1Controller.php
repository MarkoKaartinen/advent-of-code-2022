<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Day1Controller extends Controller
{
    public function __invoke()
    {
        $input = Storage::disk('root')->get('/inputs/day1/input.txt');
        $calories = collect(Str::of($input)->explode("\n"));
        $calorySum = 0;
        $calorySums = [];
        foreach ($calories as $calory){
            if($calory == ""){
                $calorySums[] = $calorySum;
                $calorySum = 0;
            }else{
                $calorySum += (int) $calory;
            }
        }

        $calorySumsColl = collect($calorySums);
        $largest = $calorySumsColl->max();
        $topThree = $calorySumsColl->sortDesc()->take(3)->sum();
        return view('day1', compact('largest', 'topThree'));
    }
}

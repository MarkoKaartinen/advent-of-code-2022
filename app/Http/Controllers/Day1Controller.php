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
        $elfsCalories = 0;
        $elfsCalorySums = [];
        foreach ($calories as $calory){
            if($calory == ""){
                $elfsCalorySums[] = $elfsCalories;
                $elfsCalories = 0;
            }else{
                $elfsCalories += (int) $calory;
            }
        }

        $elfsCalorySumsCollection = collect($elfsCalorySums);
        $mostCalories = $elfsCalorySumsCollection->max();
        $topThreeCalories = $elfsCalorySumsCollection->sortDesc()->take(3)->sum();
        return view('day1', compact('mostCalories', 'topThreeCalories'));
    }
}

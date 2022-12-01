<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Day1Controller extends Controller
{
    public function __invoke()
    {
        $calories = collect(Str::of(Storage::disk('root')->get('/inputs/day1/input.txt'))->explode("\n"));

        $elfsCalorySumsCollection = $this->sortElfsCalories($calories);
        
        $elfWithMostCalories = $elfsCalorySumsCollection->max();
        $topThreeCaloriesSummed = $elfsCalorySumsCollection->sortDesc()->take(3)->sum();

        return view('day1', compact('elfWithMostCalories', 'topThreeCaloriesSummed'));
    }

    private function sortElfsCalories(Collection $calories) : Collection
    {
        $elfsCalories = 0;
        $elfsCalorySums = [];

        foreach ($calories as $calory){
            if($calory != "") {
                $elfsCalories += (int)$calory;
            } else {
                $elfsCalorySums[] = $elfsCalories;
                $elfsCalories = 0;
            }
        }
        return collect($elfsCalorySums);
    }
}

<?php

namespace App\Http\Controllers;

use App\Days\Day1;

class Day1Controller extends Controller
{
    public function __invoke()
    {
        $day = new Day1;

        return view('day1', [
            'elfWithMostCalories' => $day->part1(),
            'topThreeCaloriesSummed' => $day->part2()
        ]);
    }
}

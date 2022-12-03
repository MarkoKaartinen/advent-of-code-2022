<?php

namespace App\Http\Controllers;

use App\Days\Day3;

class Day3Controller extends Controller
{
    public function __invoke()
    {
        $day = new Day3();

        return view('day3', [
            'first' => $day->part1(),
            'second' => $day->part2(),
        ]);
    }
}

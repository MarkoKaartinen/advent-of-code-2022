<?php

namespace App\Http\Controllers;

use App\Days\Day2;

class Day2Controller extends Controller
{
    public function __invoke()
    {

        $day = new Day2();

        return view('day2', [
            'first' => $day->part1(),
            'second' => $day->part2(),
        ]);
    }


}

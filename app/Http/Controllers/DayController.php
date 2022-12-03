<?php

namespace App\Http\Controllers;

class DayController extends Controller
{
    public function __invoke(int $dayNumber)
    {
        $class = 'App\Days\Day'.$dayNumber;
        $day = new $class;

        return view('day', [
            'day' => $dayNumber,
            'part1' => $day->part1(),
            'part2' => $day->part2(),
        ]);
    }
}

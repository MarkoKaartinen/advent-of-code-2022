<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Day2Controller extends Controller
{
    /*
     * A = Rock
     * B = Paper
     * C = Scissors
     * X = Rock
     * Y = Paper
     * Z = Scissors
     * R = Rock
     * P = Paper
     * S = Scissors
     */

    /*
     * First: 14069
     * Second: 12411
     */
    public function __invoke()
    {
        return view('day2', [
            'first' => $this->firstHalf(),
            'second' => $this->secondHalf(),
        ]);
    }

    private function secondHalf(){
        $wins = [
            'A' => 'P',
            'B' => 'S',
            'C' => 'R',
        ];
        $loses = [
            'A' => 'S',
            'B' => 'R',
            'C' => 'P',
        ];
        $ties = [
            'A' => 'R',
            'B' => 'P',
            'C' => 'S',
        ];
        $myPoints = [
            'R' => 1,
            'P' => 2,
            'S' => 3,
        ];

        $rounds = collect(Str::of(Storage::disk('root')->get('/inputs/day2/input.txt'))->explode("\n"));

        $points = 0;

        foreach ($rounds as $round){
            $choosings = Str::of($round)->explode(' ');
            $opponent = $choosings[0];
            $me = $choosings[1];

            if($me == 'X'){
                $points += $myPoints[$loses[$opponent]];
            }
            if($me == 'Y'){
                $points += $myPoints[$ties[$opponent]];
                $points += 3;
            }
            if($me == 'Z'){
                $points += $myPoints[$wins[$opponent]];
                $points += 6;
            }
        }
        return $points;
    }

    private function firstHalf(){
        $ties = ["AX", "BY", "CZ"];
        $loses = ["AZ", "BX", "CY"];
        $wins = ["AY", "BZ", "CX"];

        $myPoints = [
            'X' => 1,
            'Y' => 2,
            'Z' => 3,
        ];

        $rounds = collect(Str::of(Storage::disk('root')->get('/inputs/day2/input.txt'))->explode("\n"));

        $points = 0;

        foreach ($rounds as $round){
            $choosings = Str::of($round)->explode(' ');
            $opponent = $choosings[0];
            $me = $choosings[1];

            if(in_array($opponent.$me, $ties)){
                $points += 3;
            }
            if(in_array($opponent.$me, $wins)){
                $points += 6;
            }
            $points += $myPoints[$me];
        }
        return $points;
    }
}

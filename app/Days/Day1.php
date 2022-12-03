<?php
namespace App\Days;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Day1
{
    public Collection $calories;

    public function __construct($calories = null)
    {
        if(is_a($calories, Collection::class)) {
            $this->calories = $calories;
        }else{
            $this->calories = collect(Str::of(Storage::disk('root')->get('/inputs/day1/input.txt'))->explode("\n"));
        }
    }

    public function part1()
    {
        $elfsCalorySumsCollection = $this->sortElfsCalories($this->calories);

        return $elfsCalorySumsCollection->max();
    }

    public function part2()
    {
        $elfsCalorySumsCollection = $this->sortElfsCalories($this->calories);
        return $elfsCalorySumsCollection->sortDesc()->take(3)->sum();
    }

    private function sortElfsCalories(Collection $calories) : Collection
    {
        $elfsCalories = 0;
        $elfsCalorySums = [];

        $i = 0;
        foreach ($calories as $calory){
            $elfsCalories += (int) $calory;
            if($calory == ''){
                $elfsCalories = 0;
                $i++;
            }
            $elfsCalorySums[$i] = $elfsCalories;
        }
        return collect($elfsCalorySums);
    }
}

<?php
namespace App\Days;

use App\Helpers\DayConstructor;
use App\Interfaces\DayInterface;
use Illuminate\Support\Collection;

class Day1 implements DayInterface
{
    public Collection $calories;

    public function __construct($calories = null)
    {
        $this->calories = DayConstructor::construct($calories, 1);
    }

    public function part1(): int
    {
        $elfsCalorySumsCollection = $this->sortElfsCalories($this->calories);

        return $elfsCalorySumsCollection->max();
    }

    public function part2(): int
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

<?php
namespace App\Days;

use App\Interfaces\DayInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Day3 implements DayInterface
{
    public Collection $rucksacks;

    public function __construct($rucksacks = null)
    {
        if(is_a($rucksacks, Collection::class)) {
            $this->rucksacks = $rucksacks;
        }else{
            $this->rucksacks = collect(Str::of(Storage::disk('root')->get('/inputs/day3.txt'))->explode("\n"));
        }
    }

    public function part1(): int
    {
        $priorities = $this->priorities();
        $prioritySum = 0;
        foreach ($this->rucksacks as $rucksack){
            $rucksackStr = Str::of($rucksack);
            $items1 = collect(str_split(Str::substr($rucksack, 0, $rucksackStr->length()/2)));
            $items2 = str_split(Str::substr($rucksack, $rucksackStr->length()/2));

            $sharedItems = collect($items1->intersect($items2)->unique()->values());
            foreach ($sharedItems as $sharedItem){
                $prioritySum += $priorities[$sharedItem];
            }
        }

        return $prioritySum;
    }

    public function part2(): int
    {
        $priorities = $this->priorities();
        $prioritySum = 0;

        $groupsRucksacks = [];

        $i = 1;
        foreach ($this->rucksacks as $rucksack){
            $group[] = $rucksack;
            if($i == 3){
                $groupsRucksacks[] = $group;
                $group = [];
                $i = 1;
            }else{
                $i++;
            }
        }
        foreach ($groupsRucksacks as $groupsRucksack){
            $collection = collect(str_split($groupsRucksack[0]));
            $array1 = str_split($groupsRucksack[1]);
            $array2 = str_split($groupsRucksack[2]);
            $sharedItems1 = collect($collection->intersect($array1)->unique()->values());
            $sharedItems2 = collect($sharedItems1->intersect($array2)->unique()->values());
            foreach ($sharedItems2 as $sharedItem){
                $prioritySum += $priorities[$sharedItem];
            }
        }

        return $prioritySum;
    }

    public function priorities(): array
    {
        $priorities = [];
        $i = 1;
        for ($c = 97; $c <= 122; ++$c){
            $priorities[chr($c)] = $i;
            $i++;
        }
        for ($c = 65; $c <= 90; ++$c){
            $priorities[chr($c)] = $i;
            $i++;
        }
        return $priorities;
    }
}

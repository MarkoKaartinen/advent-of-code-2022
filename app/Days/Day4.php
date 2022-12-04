<?php
namespace App\Days;

use App\Interfaces\DayInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Day4 implements DayInterface
{
    public Collection $pairs;

    public function __construct($pairs = null)
    {
        if(is_a($pairs, Collection::class)) {
            $this->pairs = $pairs;
        }else{
            $this->pairs = collect(Str::of(Storage::disk('root')->get('/inputs/day4.txt'))->explode("\n"));
        }
    }

    public function part1(): int
    {
        $containingPairs = 0;
        foreach ($this->pairs as $pair){
            $elves = Str::of($pair)->explode(',');
            $elf1sections = Str::of($elves->get(0))->explode('-');
            $elf2sections = Str::of($elves->get(1))->explode('-');

            if($elf1sections[0] <= $elf2sections[0] && $elf1sections[1] >= $elf2sections[1]){
                $containingPairs++;
            }elseif($elf2sections[0] <= $elf1sections[0] && $elf2sections[1] >= $elf1sections[1]){
                $containingPairs++;
            }
        }
        return $containingPairs;
    }

    public function part2(): int
    {
        $containingPairs = 0;
        foreach ($this->pairs as $pair){
            $elves = Str::of($pair)->explode(',');
            $elf1sections = Str::of($elves->get(0))->explode('-');
            $elf2sections = Str::of($elves->get(1))->explode('-');

            if($elf1sections[1] >= $elf2sections[0] && $elf2sections[1] >= $elf1sections[0]) {
                $containingPairs++;
            }
        }
        return $containingPairs;
    }
}

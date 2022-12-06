<?php
namespace App\Days;

use App\Helpers\DayConstructor;
use App\Interfaces\DayInterface;
use Illuminate\Support\Collection;

class Day6 implements DayInterface
{
    public Collection $stuff;

    public function __construct($stuff = null)
    {
        $this->stuff = DayConstructor::construct($stuff, 6);
    }

    public function part1(): int
    {
        return $this->solveMarker(4);
    }

    public function part2(): int
    {
        return $this->solveMarker(14);
    }

    private function solveMarker(int $distinctCharacters): int
    {
        $letterArr = [];
        $i = 1;
        foreach (str_split($this->stuff->first()) as $letter){
            $letterArr[] = $letter;
            if(count($letterArr) == $distinctCharacters){
                if($this->checkIfLettersAreNotSame($letterArr)){
                    break;
                }
                array_shift($letterArr);
            }
            $i++;
        }
        return $i;
    }

    private function checkIfLettersAreNotSame(array $letterArr): bool
    {
        return count($letterArr) == count(array_unique($letterArr));
    }
}

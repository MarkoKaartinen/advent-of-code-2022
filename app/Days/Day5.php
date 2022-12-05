<?php
namespace App\Days;

use App\Helpers\DayConstructor;
use App\Interfaces\DayInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Day5 implements DayInterface
{
    public Collection $input;

    public int $stackNumbersRow, $instructionsRowStart;
    public Collection $instructions;
    public array $stacks;

    public function __construct($input = null)
    {
        $this->input = DayConstructor::construct($input, 5);
        $this->setup();
    }

    public function part1(): string
    {
        $this->parseStacks();
        foreach ($this->instructions as $instruction){
            list($amount, $from, $to) = $this->parseInstruction($instruction);
            for($i = 0; $i < $amount; $i++){
                $last = end($this->stacks[$from]);
                array_pop($this->stacks[$from]);
                $this->stacks[$to][] = $last;
            }
        }
        return $this->getTopCrates();
    }

    public function part2(): string
    {
        $this->parseStacks();
        foreach ($this->instructions as $instruction){
            list($amount, $from, $to) = $this->parseInstruction($instruction);
            $targets = [];
            for($i = 0; $i < $amount; $i++){
                $last = end($this->stacks[$from]);
                array_pop($this->stacks[$from]);
                array_unshift($targets, $last);
            }
            foreach ($targets as $target){
                $this->stacks[$to][] = $target;
            }
        }
        return $this->getTopCrates();
    }

    private function setup(){
        $this->figureOutStartRows();
        $this->parseInstructions();
    }

    private function parseInstruction(string $instruction): array
    {
        preg_match_all('!\d+!', $instruction, $numbers);
        return $numbers[0];
    }

    private function getTopCrates(): string
    {
        $tops = '';
        foreach ($this->stacks as $stack){
            $tops .= end($stack);
        }
        return $tops;
    }

    private function parseStacks(){
        $stacks = [];
        $amountOfStacks = Str::of($this->input->get($this->stackNumbersRow))->trim()->replace('   ', ' ')->explode(' ')->count();
        for($i = $this->stackNumbersRow-1; $i >= 0; $i--){
            $row = Str::of($this->input[$i]);
            $start = 0;
            for($stack = 1; $stack <= $amountOfStacks; $stack++){
                $crate = Str::of($row->substr($start, 3));
                if($crate->startsWith('[') && $crate->endsWith(']')){
                    $stacks[$stack][] = $crate->substr(1,1)->toString();
                }
                $start += 4;
            }
        }
        $this->stacks = $stacks;
    }

    private function parseInstructions()
    {
        $instructions = [];
        for($i = $this->instructionsRowStart; $i < $this->input->count(); $i++){
            $instructions[] = $this->input[$i];
        }
        $this->instructions = collect($instructions);
    }

    private function figureOutStartRows(){
        $foundStackRow = false;
        $foundInstructionsRow = false;
        $i = 0;
        foreach ($this->input as $row){
            $firstPart = Str::of($row)->trim()->explode(" ")->first();
            if($firstPart == 1){
                $this->stackNumbersRow = $i;
                $foundStackRow = true;
            }
            if($firstPart == "move"){
                $this->instructionsRowStart = $i;
                $foundInstructionsRow = true;
            }
            if($foundInstructionsRow && $foundStackRow){
                break;
            }
            $i++;
        }
    }
}

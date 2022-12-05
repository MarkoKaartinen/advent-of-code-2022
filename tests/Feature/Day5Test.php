<?php
use App\Days\Day5;

beforeEach(function (){
    $this->input = '    [D]
[N] [C]
[Z] [M] [P]
 1   2   3

move 1 from 2 to 1
move 3 from 1 to 3
move 2 from 2 to 1
move 1 from 1 to 2';
    $this->day = new Day5(collect(Str::of($this->input)->explode("\n")));
});

test('Day 5: Part 1', function (){
    $this->assertEquals("CMZ", $this->day->part1());
});

test('Day 5: Part 2', function (){
    $this->assertEquals("MCD", $this->day->part2());
});

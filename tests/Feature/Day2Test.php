<?php

use App\Days\Day2;

beforeEach(function (){
    $this->input = 'A Y
B X
C Z';
    $this->day = new Day2(collect(Str::of($this->input)->explode("\n")));

});

test('Day 2: Part 1', function (){
    $this->assertEquals(15, $this->day->part1());
});

test('Day 2: Part 2', function (){
    $this->assertEquals(12, $this->day->part2());
});

<?php

use App\Days\Day3;

beforeEach(function (){
    $this->input = 'vJrwpWtwJgWrhcsFMMfFFhFp
jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL
PmmdzqPrVvPwwTWBwg
wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn
ttgJtRGJQctTZtZT
CrZsJsPPZsGzwwsLwLmpwMDw';
    $this->day = new Day3(collect(Str::of($this->input)->explode("\n")));

});

test('Part 1', function (){
    $this->assertEquals(157, $this->day->part1());
});

test('Part 2', function (){
    $this->assertEquals(70, $this->day->part2());
});

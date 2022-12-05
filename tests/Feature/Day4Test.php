<?php
use App\Days\Day4;

beforeEach(function (){
    $this->input = '2-4,6-8
2-3,4-5
5-7,7-9
2-8,3-7
6-6,4-6
2-6,4-8';
    $this->day = new Day4(collect(Str::of($this->input)->explode("\n")));

});

test('Part 1', function (){
    $this->assertEquals(2, $this->day->part1());
});

test('Part 2', function (){
    $this->assertEquals(4, $this->day->part2());
});

<?php

use App\Days\Day1;
use Illuminate\Support\Str;

beforeEach(function (){
    $this->input = '1000
2000
3000

4000

5000
6000

7000
8000
9000

10000';
    $this->day = new Day1(collect(Str::of($this->input)->explode("\n")));

});

test('Part 1', function (){
    $this->assertEquals(24000, $this->day->part1());
});

test('Part 2', function (){
    $this->assertEquals(45000, $this->day->part2());
});


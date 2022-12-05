<?php
use App\Days\Day1;
use App\Days\Day2;
use App\Days\Day3;
use App\Days\Day4;
use App\Days\Day5;

test('Day 1: Part 1', function (){
    $this->assertEquals(68802, (new Day1)->part1());
});

test('Day 1: Part 2', function (){
    $this->assertEquals(205370, (new Day1)->part2());
});

test('Day 2: Part 1', function (){
    $this->assertEquals(14069, (new Day2)->part1());
});

test('Day 2: Part 2', function (){
    $this->assertEquals(12411, (new Day2)->part2());
});

test('Day 3: Part 1', function (){
    $this->assertEquals(7446, (new Day3)->part1());
});

test('Day 3: Part 2', function (){
    $this->assertEquals(2646, (new Day3)->part2());
});

test('Day 4: Part 1', function (){
    $this->assertEquals(567, (new Day4)->part1());
});

test('Day 4: Part 2', function (){
    $this->assertEquals(907, (new Day4)->part2());
});

test('Day 5: Part 1', function (){
    $this->assertEquals("FWNSHLDNZ", (new Day5)->part1());
});

test('Day 5: Part 2', function (){
    $this->assertEquals("RNRGDNFQG", (new Day5)->part2());
});

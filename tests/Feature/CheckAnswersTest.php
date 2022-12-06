<?php
use App\Days\Day1;
use App\Days\Day2;
use App\Days\Day3;
use App\Days\Day4;
use App\Days\Day5;
use App\Days\Day6;

test('Day 1', function (){
    $this->assertEquals(68802, (new Day1)->part1());
    $this->assertEquals(205370, (new Day1)->part2());
});

test('Day 2', function (){
    $this->assertEquals(14069, (new Day2)->part1());
    $this->assertEquals(12411, (new Day2)->part2());
});

test('Day 3', function (){
    $this->assertEquals(7446, (new Day3)->part1());
    $this->assertEquals(2646, (new Day3)->part2());
});

test('Day 4', function (){
    $this->assertEquals(567, (new Day4)->part1());
    $this->assertEquals(907, (new Day4)->part2());
});

test('Day 5', function (){
    $this->assertEquals("FWNSHLDNZ", (new Day5)->part1());
    $this->assertEquals("RNRGDNFQG", (new Day5)->part2());
});

test('Day 6', function (){
    $this->assertEquals(1287, (new Day6())->part1());
    $this->assertEquals(3716, (new Day6())->part2());
});

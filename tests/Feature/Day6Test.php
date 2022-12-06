<?php
use App\Days\Day6;

test('Part 1', function (){
    $tests = [
        'mjqjpqmgbljsphdztnvjfqwrcgsmlb' => 7,
        'bvwbjplbgvbhsrlpgdmjqwftvncz' => 5,
        'nppdvjthqldpwncqszvftbrmjlhg' => 6,
        'nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg' => 10,
        'zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw' => 11,
    ];
    foreach ($tests as $input => $result){
        $day = new Day6(collect([$input]));
        $this->assertEquals($result, $day->part1());
    }
});

test('Part 2', function (){
    $tests = [
        'mjqjpqmgbljsphdztnvjfqwrcgsmlb' => 19,
        'bvwbjplbgvbhsrlpgdmjqwftvncz' => 23,
        'nppdvjthqldpwncqszvftbrmjlhg' => 23,
        'nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg' => 29,
        'zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw' => 26,
    ];
    foreach ($tests as $input => $result){
        $day = new Day6(collect([$input]));
        $this->assertEquals($result, $day->part2());
    }
});

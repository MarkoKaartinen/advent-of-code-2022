<?php
use App\Days\Day7;

beforeEach(function (){
    $this->input = '$ cd /
$ ls
dir a
14848514 b.txt
8504156 c.dat
dir d
$ cd a
$ ls
dir e
29116 f
2557 g
62596 h.lst
$ cd e
$ ls
584 i
$ cd ..
$ cd ..
$ cd d
$ ls
4060174 j
8033020 d.log
5626152 d.ext
7214296 k';
    $this->day = new Day7(collect(Str::of($this->input)->explode("\n")));
});

test('Part 1', function (){
    $this->assertEquals(95437, $this->day->part1());
});

test('Part 2', function (){
    $this->assertEquals(24933642, $this->day->part2());
});

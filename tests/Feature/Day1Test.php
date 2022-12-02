<?php

test('Day 1: Part 1 answer', function (){
    $this->get(route('day1'))->assertSeeTextInOrder([
        'Part 1:',
        '68802'
    ]);
});

test('Day 1: Part 2 answer', function (){
    $this->get(route('day1'))->assertSeeTextInOrder([
        'Part 2:',
        '205370'
    ]);
});


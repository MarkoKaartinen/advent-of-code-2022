<?php

test('Day 2: Part 1 answer', function (){
    $this->get(route('day2'))->assertSeeTextInOrder([
        'Part 1:',
        '14069'
    ]);
});

test('Day 2: Part 2 answer', function (){
    $this->get(route('day2'))->assertSeeTextInOrder([
        'Part 2:',
        '12411'
    ]);
});

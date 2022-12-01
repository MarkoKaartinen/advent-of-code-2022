<?php

test('First task answer is still correct', function (){
    $this->get(route('day1'))->assertSeeText("68802");
});

test('Seconds task answer is still correct', function (){
    $this->get(route('day1'))->assertSeeText("205370");
});


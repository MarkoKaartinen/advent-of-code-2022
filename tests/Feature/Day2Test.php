<?php

test('First task answer is still correct', function (){
    $this->get(route('day2'))->assertSeeText("14069");
});

test('Seconds task answer is still correct', function (){
    $this->get(route('day2'))->assertSeeText("12411");
});

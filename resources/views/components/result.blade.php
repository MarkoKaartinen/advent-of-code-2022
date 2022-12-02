@props(['part', 'answer'])
<div {{ $attributes->merge(['class' => 'flex items-center text-xl']) }}>
    <div class="text-aoc-green mr-2">
        Part {{ $part }}:
    </div>
    <div>
        {{ $answer }}
    </div>
</div>

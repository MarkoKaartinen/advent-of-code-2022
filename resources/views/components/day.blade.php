@props(['day'])
<div class="border-2 border-dashed px-8 py-8 inline-block hover:border-aoc-green">
    <h2 class="text-3xl font-bold text-aoc-green mb-6 leading-none">Day {{ $day }}</h2>

    {{ $slot }}
</div>

<div class="w-full mt-6">
    <a class="border border-dashed border-white px-4 py-2 hover:border-aoc-green hover:text-aoc-green" href="https://adventofcode.com/2022/day/{{ $day }}" target="_blank">Check puzzle</a>
</div>

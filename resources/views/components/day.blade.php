@props(['day'])
<div class="border-2 border-dashed px-8 py-8 inline-block hover:border-aoc-green">
    <h2 class="text-3xl font-bold text-aoc-green mb-6 leading-none">Day {{ $day }}</h2>

    {{ $slot }}
</div>

<div class="w-full mt-6">
    <a class="border border-dashed border-white px-4 py-2 hover:border-aoc-green hover:text-aoc-green inline-flex items-center" href="https://adventofcode.com/2022/day/{{ $day }}" target="_blank">
        <span class="mr-2">Check puzzle</span>
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
            </svg>
        </span>
    </a>
</div>

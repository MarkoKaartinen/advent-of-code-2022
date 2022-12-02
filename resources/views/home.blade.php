<x-app>
    <div class="flex flex-wrap">
        @for($day = 1; $day <= 25; $day++)
            <div class="mr-2 mb-2 grow">
                @if(Route::has('day'.$day))
                    <a class="border-2 uppercase font-bold tracking-wider border-dashed px-4 py-3 hover:border-aoc-green hover:text-aoc-green text-2xl text-center block" href="{{ route('day'.$day) }}">Day {{ $day }}</a>
                @else
                    <span class="border-2 uppercase border-gray-600 text-gray-600 font-bold tracking-wider border-dashed px-4 py-3 text-2xl text-center block cursor-default">Day {{ $day }}</span>
                @endif
            </div>
        @endfor
    </div>
    <div class="pt-12">
        <a target="_blank" class="border-2 uppercase font-bold tracking-wider border-dashed px-4 py-2 hover:border-aoc-green hover:text-aoc-green text-xl text-center inline-flex items-center" href="https://adventofcode.com/">
            <span class="mr-2">Advent of Code</span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                </svg>

            </span>
        </a>
    </div>
</x-app>

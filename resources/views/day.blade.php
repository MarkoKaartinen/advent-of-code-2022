<x-app>
    <x-day day="{{ $day }}">
        <x-result class="mb-6" part="1" :answer="$part1" />
        <x-result part="2" :answer="$part2" />
    </x-day>
</x-app>

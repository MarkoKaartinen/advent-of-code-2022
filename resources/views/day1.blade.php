<x-app>
    <div class="border-2 border-dashed px-8 py-8">
        <h1 class="text-3xl font-bold text-aoc-green mb-6 leading-none">Day 1</h1>

        <div class="mb-6">
            <div class="text-aoc-green">Find the Elf carrying the most Calories. <strong>How many total Calories is that Elf carrying?</strong></div>
            <div class="text-xl">{{ $mostCalories }}</div>
        </div>
        <div>
            <div class="text-aoc-green">Find the top three Elves carrying the most Calories. <strong>How many Calories are those Elves carrying in total?</strong></div>
            <div class="text-xl">{{ $topThreeCalories }}</div>
        </div>
    </div>
</x-app>

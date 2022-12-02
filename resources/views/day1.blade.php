<x-app>
    <div class="border-2 border-dashed px-8 py-8">
        <h2 class="text-3xl font-bold text-aoc-green mb-6 leading-none">Day 1</h2>

        <div class="mb-6">
            <x-question>
                Find the Elf carrying the most Calories. <strong>How many total Calories is that Elf carrying?</strong>
            </x-question>
            <x-answer>
                {{ $elfWithMostCalories }}
            </x-answer>
        </div>
        <div>
            <x-question>
                Find the top three Elves carrying the most Calories. <strong>How many Calories are those Elves carrying in total?</strong>
            </x-question>
            <x-answer>
                {{ $topThreeCaloriesSummed }}
            </x-answer>
        </div>
    </div>
</x-app>

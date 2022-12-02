<x-app>
    <div class="border-2 border-dashed px-8 py-8">
        <h2 class="text-3xl font-bold text-aoc-green mb-6 leading-none">Day 2</h2>

        <div class="mb-6">
            <x-question>
                What would your total score be if everything goes exactly according to your strategy guide?
            </x-question>
            <x-answer>
                {{ $first }}
            </x-answer>
        </div>
        <div>
            <x-question>
                Following the Elf's instructions for the second column, <strong>what would your total score be if everything goes exactly according to your strategy guide?</strong>
            </x-question>
            <x-answer>
                {{ $second }}
            </x-answer>
        </div>
    </div>
</x-app>

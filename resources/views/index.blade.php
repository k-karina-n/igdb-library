<x-layaout>
    <div class="container mx-auto px-14">
        <h2 class="text-gray-700 uppercase tracking-wide font-semibold">Popular games</h2>
        <div
            class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-14 border-b border-zinc-500 pb-16">
            @foreach ($popularGames as $game)
                <x-game.popular :game="$game" />
            @endforeach
        </div>

        <div class="flex flex-col lg:flex-row my-10">
            <div class="w-full lg:w-3/4 m-0 lg:mr-32">
                <h2 class="text-gray-700 uppercase tracking-wide font-semibold">Recently reviewed</h2>
                <div class="container space-y-12 mt-8">
                    @foreach ($reviewedGames as $game)
                        <x-game.reviewed :game="$game" />
                    @endforeach
                </div>
            </div>

            <div class="mt-12 lg:w-1/4 lg:mt-0">
                <h2 class="font-semibold uppercase text-gray-700 tracking-wide">Coming soon</h2>

                <div class="container space-y-10 mt-8">
                    @foreach ($comingGames as $game)
                        <x-game.coming :game="$game" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layaout>

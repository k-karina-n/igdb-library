<div class="container space-y-10 mt-6">
    @foreach ($comingGames as $game)
        <div class="flex px-4 py-4 rounded-lg">

            <x-cover :game=$game class="w-32 h-36" />

            <div class="flex flex-col justify-center ml-2">
                <a href="/game_reviews/{{ $game->getSlug() }}"
                    class="w-40 block px-2 py-2 
        capitalize text-lg text-center font-semibold leading-tight
        text-transparent bg-clip-text bg-gradient-to-r from-purple-500/50 to-pink-500/50
        hover:-translate-y-1 hover:scale-105 transition ease-in-out duration-300
        hover:bg-gradient-to-l">
                    {{ $game->getName() }}
                </a>
            </div>
        </div>
    @endforeach
</div>

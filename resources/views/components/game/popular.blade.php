<div class="mt-8 h-80">
    <div class="relative inline-block">
        <a href="/game_reviews/{{ $game->getSlug() }}">
            <img alt="game-cover"
                class="w-44 h-56 rounded-lg shadow-md hover:blur-xs transition ease-in-out duration-500"
                src="{{ $game->getCover() }}">
        </a>
    </div>

    <a href="/game_reviews/{{ $game->getSlug() }}"
        class="block mt-4 text-white text-base font-semibold leading-tight 
        hover:-translate-y-1 hover:scale-100 transition ease-in-out duration-300
        hover:text-transparent hover:bg-clip-text hover:bg-gradient-to-r from-purple-500 to-pink-500">
        {{ $game->getName() }}
    </a>

    <div class="text-slate-300 italic mt-2">
        {{ $game->getPlatforms() }}
    </div>
</div>

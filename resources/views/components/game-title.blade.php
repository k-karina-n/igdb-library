<a href="/game_reviews/{{ $game->getSlug() }}"
     class="{{ $class }} block mt-4 capitalize text-white font-semibold leading-tight 
        hover:-translate-y-1 hover:scale-100 transition ease-in-out duration-300
        hover:text-transparent hover:bg-clip-text hover:bg-gradient-to-r from-purple-500 to-pink-500">
     {{ $game->getName() }}
</a>

<div class="text-slate-300 italic mt-2">
     {{ $game->getPlatforms() }}
</div>

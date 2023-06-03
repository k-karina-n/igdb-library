<ul>
    @if (count($results) > 0)
        @foreach ($results as $game)
            <li class="border-b border-dark/75">
                <a href="/game_reviews/{{ $game->getSlug() }}"
                    class="block flex items-center transition ease-in-out duration-150 px-3 py-3
                    hover:bg-dark hover:text-white hover:font-semibold"
                    alt="cover.jpg">
                    <img src="{{ $game->getCover() }}" alt="game cover" class="w-10 rounded">
                    <span class="ml-4">{{ $game->getName() }}</span>
                </a>
            </li>
        @endforeach
    @else
        <div class="py-3 px-3">No results</div>
    @endif
</ul>

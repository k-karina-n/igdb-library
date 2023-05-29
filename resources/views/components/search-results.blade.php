<ul>
    @if (count($results) > 0)
        @foreach ($results as $game)
            <li class="border-b border-gray rounded">
                <a href="/game_reviews/{{ $game['slug'] }}"
                    class="block hover:bg-gray hover:rounded flex items-center transition ease-in-out duration-150 px-3 py-3"
                    alt="cover.jpg">
                    <img src="{{ $game['cover'] }}" alt="game cover" class="w-10 rounded">
                    <span class="ml-4">{{ $game['name'] }}</span>
                </a>
            </li>
        @endforeach
    @else
        <div class="py-3 px-3">No results</div>
    @endif
</ul>

<div class="mt-8">
    <div class="relative inline-block">
        <a href="/game_reviews/{{ $game['slug'] }}">
            <img alt="game-cover"
                class="w-44 h-56 rounded-lg shadow-md hover:opacity-75 transition ease-in-out duration-150"
                src="{{ $game['cover'] }}">
        </a>
    </div>

    <a href="/game_reviews/{{ $game['slug'] }}"
        class="block mt-4 text-white text-base font-semibold leading-tight hover:transitoon ease-in-out duration-150 hover:text-gray hover:underline underline-offset-8 hover:pb-1 hover:leading-relaxed">
        {{ $game['name'] }}
    </a>

    <div class="text-gray mt-1">
        {{ $game['platforms'] }}
    </div>
</div>

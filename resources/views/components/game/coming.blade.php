<div class="flex {{-- ml-4 mt-12  --}} px-4 py-4 rounded-lg
    {{-- hover:shadow-lg hover:shadow-purple-500 transition ease-in-out duration-500 --}}">
    <a href="/game_reviews/{{ $game['slug'] }}">
        <img alt="game-cover" class="w-24 h-32 rounded-lg shadow-md hover:blur-xs duration-500"
            src="{{ $game['cover'] }}">
    </a>

    <div class="flex flex-col justify-center ml-2">
        <a href="/game_reviews/{{ $game['slug'] }}"
            class="w-40 block px-2 py-2 
        capitalize text-lg text-center font-semibold leading-tight
        text-transparent bg-clip-text bg-gradient-to-r from-purple-500/50 to-pink-500/50
        hover:-translate-y-1 hover:scale-105 transition ease-in-out duration-300
        hover:bg-gradient-to-l">
            {{ $game['name'] }}
        </a>
    </div>
</div>

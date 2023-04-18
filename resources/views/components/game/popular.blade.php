<div class="mt-8">
    <div class="relative inline-block">
        <a href="/game_reviews">
            <img alt="game-cover"
                class="w-44 h-56 rounded-lg shadow-md hover:opacity-75 transition ease-in-out duration-150"
                @if (array_key_exists('cover', $game)) src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}"
                @else
                    src="/no-image.jpg" @endif>
        </a>
        @if (isset($game['rating']))
            <div class="absolute bottom-0 right-0 w-14 h-14 bg-zinc-100 rounded-full border border-zinc-600 shadow-md"
                style="right: -20px; bottom: -20px">
                <div class="font-semibold text-lg text-gray-700 flex justify-center items-center h-full">
                    {{ round($game['rating']) . '%' }}
                </div>
            </div>
        @endif
    </div>

    <a href="#" class="block mt-4 text-base font-semibold leading-tight hover:text-zinc-500">
        {{ $game['name'] }}
    </a>

    <div class="text-gray-500 mt-1">
        @foreach ($game['platforms'] as $platform)
            @if (array_key_exists('abbreviation', $platform))
                {{ $platform['abbreviation'] }}
            @endif
        @endforeach
    </div>
</div>

<div class="flex bg-blue rounded-lg shadow-md flex px-6 py-6">
    <div class="relative flex-none">
        <a href="/game_reviews/{{ $game['slug'] }}">
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

    <div class="ml-12">
        <a href="/game_reviews/{{ $game['slug'] }}" class="block mt-4 capitalize text-lg text-white font-semibold leading-tight hover:transitoon ease-in-out duration-150 hover:text-gray hover:underline underline-offset-8 hover:pb-1 hover:leading-relaxed">
            {{ $game['name'] }}
        </a>

        <div class="text-white mt-1">
            @foreach ($game['platforms'] as $platform)
                @if (array_key_exists('abbreviation', $platform))
                    {{ $platform['abbreviation'] }}
                @endif
            @endforeach
        </div>

        <p class="mt-6 text-white hidden md:block lg:block">{{ $game['summary'] }}</p>
    </div>
</div>

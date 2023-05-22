<div class="flex bg-blue rounded-lg shadow-md px-6 py-6">
    <div class="relative flex-none">
        <a href="/game_reviews/{{ $game['slug'] }}">
            <img alt="game-cover"
                class="w-44 h-56 rounded-lg shadow-md hover:opacity-75 transition ease-in-out duration-150"
                src="{{ $game['coverImageUrl'] }}">
        </a>

        @if (isset($game['rating']))
            <div class="absolute bottom-0 right-0 w-14 h-14 bg-zinc-100 rounded-full border border-zinc-600 shadow-md"
                style="right: -20px; bottom: -20px">
                <div class="font-semibold text-lg text-gray-700 flex justify-center items-center h-full">
                    {{ $game['rating'] }}
                </div>
            </div>
        @endif
    </div>

    <div class="ml-12">
        <a href="/game_reviews/{{ $game['slug'] }}" class="block mt-4 capitalize text-lg text-white font-semibold leading-tight hover:transitoon ease-in-out duration-150 hover:text-gray hover:underline underline-offset-8 hover:pb-1 hover:leading-relaxed">
            {{ $game['name'] }}
        </a>

        <div class="text-white mt-1">
            {{ $game['platforms'] }}
        </div>

        <p class="mt-6 text-white hidden md:block lg:block h-32 overflow-auto">{{ $game['summary'] }}</p>
    </div>
</div>

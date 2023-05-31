<div class="flex px-6 py-8 rounded-lg">

    <div class="relative flex-none">
        <a href="/game_reviews/{{ $game['slug'] }}">
            <img alt="game-cover" class="w-44 h-56 rounded-lg shadow-md hover:blur-xs transition ease-in-out duration-500"
                src="{{ $game['cover'] }}">
        </a>

        @if (isset($game['rating']))
            <div id="{{ $game['slug'] }}"
                class="absolute bottom-0 right-0 w-14 h-14 bg-dark rounded-full shadow-md shadow-purple-500"
                style="right: -20px; bottom: -20px">
                {{-- @push('scripts')
                    @include('rating', [
                        'id' => '#' . $game['slug'],
                        'rating' => $game['rating'],
                    ])
                @endpush --}}
                <div
                    class="flex justify-center items-center h-full
                 font-semibold text-lg text-transparent bg-clip-text 
                 bg-gradient-to-r from-purple-500 to-pink-500">
                    {{ $game['rating'] }}
                </div>
            </div>
        @endif
    </div>

    <div class="ml-12">
        <div class="h-8">
            <a href="/game_reviews/{{ $game['slug'] }}"
                class="block mt-4 capitalize text-lg text-white font-semibold leading-tight 
            hover:translate-x-1 hover:scale-100 transition ease-in-out duration-300
            hover:text-transparent hover:bg-clip-text hover:bg-gradient-to-r from-purple-500 to-pink-500">
                {{ $game['name'] }}
            </a>

            <div class="text-slate-300 italic mt-2">
                {{ $game['platforms'] }}
            </div>
        </div>

        <p class="mt-12 text-white hidden md:block lg:block h-32 overflow-auto">{{ $game['summary'] }}</p>
    </div>
</div>

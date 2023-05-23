<div class="mt-8">
    <div class="relative inline-block">
        <a href="/game_reviews/{{ $game['slug'] }}">
            <img alt="game-cover"
                class="w-44 h-56 rounded-lg shadow-md hover:opacity-75 transition ease-in-out duration-150"
                src="{{ $game['cover'] }}">
        </a>

        @if (isset($game['rating']))
            <div id="{{ $game['slug'] }}"
                class="absolute bottom-0 right-0 w-14 h-14 bg-zinc-100 rounded-full border border-zinc-600 shadow-md"
                style="right: -20px; bottom: -20px">
                    @push('scripts')
                        @include('rating', [
                            'id' => '#' . $game['slug'],
                            'rating' => $game['rating'],
                        ])
                    @endpush
                {{-- <div class="font-semibold text-lg text-gray-700 flex justify-center items-center h-full">
                    {{ $game['rating'] }}
                </div> --}}
            </div>
        @endif
    </div>

    <a href="/game_reviews/{{ $game['slug'] }}"
        class="block mt-4 text-white text-base font-semibold leading-tight hover:transitoon ease-in-out duration-150 hover:text-gray hover:underline underline-offset-8 hover:pb-1 hover:leading-relaxed">
        {{ $game['name'] }}
    </a>

    <div class="text-gray mt-1">
        {{ $game['platforms'] }}
    </div>
</div>

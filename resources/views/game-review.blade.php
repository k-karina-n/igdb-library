<x-layaout>
    <div class="px-28 container mx-auto">
        {{-- Game details --}}
        <div class="pb-4 py-4 px-4 bg-blue rounded-lg shadow-md flex flex-col lg:flex-row">

            <div class="flex-none">
                <img @if (array_key_exists('cover', $game)) src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}"
                @else
                    src="/no-image.jpg" @endif
                    alt="cover" class="w-52 h-72 rounded-lg shadow-md">

                <div class="mt-6 mx-6">
                    <button
                        class="flex bg-gray rounded-lg shadow-md text-white font-semibold px-4 py-4 hover:bg-gray-600 rounded transition ease-in-out duration-150">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z">
                            </path>
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
            </div>

            <div class="lg:ml-12 xl:mr-64">
                <h2 class="font-semibold capitalize text-white text-4xl mt-1">
                    {{ $game['name'] }}
                </h2>
                <div class="mt-3 text-white">
                    <span>
                        @foreach ($game['genres'] as $genre)
                            {{ $genre['name'] }}
                        @endforeach
                    </span>
                    <span class="font-bold text-xl">|</span>
                    <span>{{ $game['involved_companies'][0]['company']['name'] }}</span>
                    <span class="font-bold text-xl">|</span>
                    <span>{{ $game['platforms'][0]['abbreviation'] }}</span>
                </div>

                <div class="mt-8 flex flex-wrap items-center space-x-12">
                    <div class="flex items-center space-x-2">
                        <div id="memberRating"
                            class="w-14 h-14 bg-zinc-100 rounded-full relative text-md">
                            @push('scripts')
                                @include('rating', [
                                    'id' => '#memberRating',
                                    'rating' => round($game['total_rating']),
                                ])
                            @endpush
                        </div>
                        <div class="text-xs text-white">Member <br> Score</div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <div id="criticRating"
                            class="w-14 h-14 bg-zinc-100 rounded-full relative text-md">
                            @push('scripts')
                                @include('rating', [
                                    'id' => '#criticRating',
                                    'rating' => round($game['total_rating_count']),
                                ])
                            @endpush
                        </div>
                        <div class="text-xs text-white">Critic <br> Score</div>
                    </div>
                </div>

                <p class="mt-12 text-white text-justify">{{ $game['storyline'] }}</p>
            </div>
        </div>

        {{-- Images --}}
        <div class="pb-4 py-4 px-4 bg-blue rounded-lg shadow-md relative images-container pb-12 mt-8">
            <h2 class="text-white uppercase tracking-wide font-semibold">Images</h2>
            <div class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach ($game['screenshots'] as $img)
                    <a {{-- href="{{ Str::replaceFirst('thumb', 'screenshot_huge', $img['url']) }}" --}}>
                        <img src="{{ Str::replaceFirst('thumb', 'screenshot_big', $img['url']) }}" alt="screenshot"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Similar games --}}
        <div class="pb-4 py-4 px-4 bg-blue rounded-lg shadow-md container mt-8">
            <h2 class="text-white uppercase tracking-wide font-semibold">Similar Games</h2>
            <div class="overflow-y-auto overflow-x-hidden h-96 text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-5 gap-10">
                @foreach ($game['similar_games'] as $game)
                    <x-game.popular :game="$game" />
                @endforeach
            </div>
        </div>
    </div>
</x-layaout>

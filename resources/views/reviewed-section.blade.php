<div class="container space-y-12 mt-6">
    @foreach ($reviewedGames as $game)
        <div class="flex px-6 py-8 rounded-lg">

            <div class="relative flex-none">
                <x-cover :game=$game class="w-48 h-64" />

                @if ($game->getRating())
                    <div id="{{ $game->getSlug() }}"
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
                            {{ $game->getRating() }}
                        </div>
                    </div>
                @endif
            </div>

            <div class="ml-12">
                <div class="h-8">
                    <x-game-title :game=$game class="text-lg" />
                </div>

                <p class="mt-12 text-white hidden md:block lg:block h-32 overflow-auto">{{ $game->getSummary() }}</p>
            </div>
        </div>
    @endforeach
</div>

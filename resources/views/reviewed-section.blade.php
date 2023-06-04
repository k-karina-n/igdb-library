<div class="container space-y-12 mt-6">
    @foreach ($reviewedGames as $game)
        <div class="flex px-6 py-8 rounded-lg">

            <div class="relative flex-none">
                <x-cover :game=$game class="w-48 h-64" />

                @if ($game->getRating())
                    <div class="absolute bottom-0 right-0 w-14 h-14 bg-dark rounded-full shadow-md shadow-purple-500"
                        style="right: -20px; bottom: -20px">
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

                <div class="content mt-12 text-white hidden lg:block">
                    <div x-data="{ open: false, maxLength: 260, fullText: '', slicedText: '' }" x-init="fullText = $el.firstElementChild.textContent.trim();
                    slicedText = fullText.slice(0, maxLength)">
                        <div x-text="open ? fullText : slicedText.concat('...')" x-transition>{{ $game->getSummary() }}
                            <div id="button"
                                class="mt-4 leading-tight hover:-translate-y-1 hover:scale-100 transition ease-in-out duration-300
                                hover:text-transparent hover:bg-clip-text hover:bg-gradient-to-r from-purple-500 to-pink-500">
                                <a href="/game_reviews/{{ $game->getSlug() }}">
                                    Read Full Text
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

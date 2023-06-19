<x-layaout>
    <div class="px-28 container mx-auto">

        {{-- Game details --}}
        <div class="pb-4 py-4 px-4 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ $game->getCover() }}" alt="cover" class="w-52 h-72 rounded-lg shadow-md">

                <div x-data="{ isTrailerModalVisible: false }" class="mt-6 mx-6">
                    <button @click="isTrailerModalVisible = true"
                        class="flex px-4 py-4 rounded-lg shadow-md text-white font-semibold
                        bg-gradient-to-r from-purple-500/75 to-pink-500/75
                        hover:bg-gradient-to-l duration-150">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z">
                            </path>
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>

                    <x-modal if="isTrailerModalVisible" :game=$game />
                </div>
            </div>

            <div class="lg:ml-12 xl:mr-64">
                <h2
                    class="pb-2 text-4xl font-semibold capitalize italic text-transparent 
                        bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500">
                    {{ $game->getName() }}
                </h2>

                <div class="mt-3 text-slate-300">
                    <span>{{ $game->getGenres() }}</span>
                    <span class="font-bold text-xl">|</span>
                    <span>{{ $game->getCompany() }}</span>
                    <span class="font-bold text-xl">|</span>
                    <span>{{ $game->getPlatforms() }}</span>
                </div>

                <div class="mt-8 flex flex-wrap items-center space-x-12">
                    <x-rating id="memberRating" :rating="$game->getTotalRating()" score="Member" />
                    <x-rating id="criticRating" :rating="$game->getTotalRatingCount()" score="Critic" />
                </div>

                <p class="mt-12 text-white text-justify">{{ $game->getStoryline() }}</p>
            </div>
        </div>

        {{-- Images --}}
        <div x-data="{ isImageModalVisible: false, image: '' }" class="images-container relative pb-4 py-4 px-4 mt-8">
            <x-h2 title="Images" />

            <div class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach ($game->getScreenshots() as $screenshot)
                    <a href="#"
                        @click.prevent="
                                isImageModalVisible = true
                                image='{{ $screenshot['huge'] }}'
                            ">
                        <img src="{{ $screenshot['big'] }}" alt="screenshot"
                            class="rounded-lg hover:blur-xs transition ease-in-out duration-500">
                    </a>
                @endforeach
            </div>

            <x-modal if="isImageModalVisible" />
        </div>

        {{-- Similar games --}}
        <div class="container pb-4 py-4 px-4 mt-8">

            <x-h2 title="Similar Games" />
            <div
                class="mt-4 text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-5 gap-10">
                @foreach ($game->getSimilarGames() as $game)
                    <div class="mt-8 h-80">
                        <div class="relative inline-block">
                            <x-cover :game=$game class="w-44 h-56" />
                        </div>

                        <x-game-title :game=$game class="text-base" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layaout>

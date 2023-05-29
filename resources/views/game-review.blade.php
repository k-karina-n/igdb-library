<x-layaout>
    <div class="px-28 container mx-auto">
        {{-- Game details --}}
        <div class="pb-4 py-4 px-4 bg-blue rounded-lg shadow-md flex flex-col lg:flex-row">

            <div class="flex-none">
                <img src="{{ $game['cover'] }}" alt="cover" class="w-52 h-72 rounded-lg shadow-md">

                <div x-data="{ isTrailerModalVisible: false }" class="mt-6 mx-6">
                    <button @click="isTrailerModalVisible = true"
                        class="flex bg-gray rounded-lg shadow-md text-white font-semibold px-4 py-4 hover:bg-pink-200 rounded transition ease-in-out duration-150">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z">
                            </path>
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>

                    <template x-if="isTrailerModalVisible">
                        <div style="background-color: rgba(0, 0, 0, .8);"
                            class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            @click="isTrailerModalVisible = false">
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative"
                                        style="padding-top: 56.25%">
                                        <iframe width="560" height="315"
                                            class="responsive-iframe absolute top-0 left-0 w-full h-full rounded-lg"
                                            src="{{ $game['trailer'] }}" style="border:0;"
                                            allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <div class="lg:ml-12 xl:mr-64">
                <h2 class="font-semibold capitalize text-white text-4xl mt-1">
                    {{ $game['name'] }}
                </h2>
                <div class="mt-3 text-white">
                    <span>{{ $game['genres'] }}</span>
                    <span class="font-bold text-xl">|</span>
                    <span>{{ $game['involved_companies'] }}</span>
                    <span class="font-bold text-xl">|</span>
                    <span>{{ $game['platforms'] }}</span>
                </div>

                <div class="mt-8 flex flex-wrap items-center space-x-12">
                    <div class="flex items-center space-x-2">
                        <div id="memberRating" class="w-14 h-14 bg-zinc-100 rounded-full relative text-md">
                            @push('scripts')
                                @include('rating', [
                                    'id' => '#memberRating',
                                    'rating' => $game['total_rating'],
                                ])
                            @endpush
                        </div>
                        <div class="text-xs text-white">Member <br> Score</div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <div id="criticRating" class="w-14 h-14 bg-zinc-100 rounded-full relative text-md">
                            @push('scripts')
                                @include('rating', [
                                    'id' => '#criticRating',
                                    'rating' => $game['total_rating_count'],
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
        <div x-data="{ isImageModalVisible: false, image: '' }"
            class="images-container pb-4 py-4 px-4 bg-blue rounded-lg shadow-md relative pb-12 mt-8">
            <h2 class="text-white uppercase tracking-wide font-semibold">Images</h2>
            <div class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach ($game['screenshots'] as $screenshot)
                    <a href="#"
                        @click.prevent="
                                isImageModalVisible = true
                                image='{{ $screenshot['huge'] }}'
                            ">
                        <img src="{{ $screenshot['big'] }}" alt="screenshot"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                @endforeach
            </div>

            <template x-if="isImageModalVisible">
                <div style="background-color: rgba(0, 0, 0, .8);"
                    class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                    @click="isImageModalVisible = false">
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="modal-body px-8 py-8">
                            <img :src="image" class="rounded-lg" alt="screenshot">
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- Similar games --}}
        <div class="pb-4 py-4 px-4 bg-blue rounded-lg shadow-md container mt-8">
            <h2 class="text-white uppercase tracking-wide font-semibold">Similar Games</h2>
            <div
                class="overflow-y-auto overflow-x-hidden h-96 text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-5 gap-10">
                @foreach ($game['similar_games'] as $game)
                    <x-game.popular :game="$game" />
                @endforeach
            </div>
        </div>
    </div>
</x-layaout>

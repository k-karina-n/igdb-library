<template x-if="{{ $if }}">
    <div style="background-color: rgba(0, 0, 0, .8);"
        class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
        @click="{{$if}} = false">
        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
            <div class="modal-body px-8 py-8">
                @if ($if == 'isImageModalVisible')
                    <img :src="image" class="rounded-lg" alt="screenshot">
                @else
                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                        <iframe width="560" height="315"
                            class="responsive-iframe absolute top-0 left-0 w-full h-full rounded-lg"
                            src="{{ $game->getTrailer() }}" style="border:0;" allow="autoplay; encrypted-media"
                            allowfullscreen></iframe>
                    </div>
                @endif
            </div>
        </div>
    </div>
</template>

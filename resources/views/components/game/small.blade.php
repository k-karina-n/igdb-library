<div class="flex">
    <a href="#">
        <img src="{{ $img }}" alt="game-cover"
            class="w-14 h-20 rounded-lg shadow-md hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="ml-4">
        <a href="#" class="block mt-4 capitalize text-sm font-semibold leading-tight hover:text-zinc-500">
            {{ $game }}
        </a>
        <p class="capitalize text-sm">{{ $author }}</p>
    </div>
</div>

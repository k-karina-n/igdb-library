<div class="flex">
    <a href="#">
        <img alt="game-cover" class="w-24 h-32 rounded-lg shadow-md hover:opacity-75 transition ease-in-out duration-150"
            @if (array_key_exists('cover', $game)) src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}"
                @else
                    src="/no-image.jpg" @endif>
    </a>

    <div class="ml-4">
        <a href="#" class="block mt-4 capitalize text-sm font-semibold leading-tight hover:text-zinc-500">
            {{ $game['name'] }}
        </a>

        <p class="mt-2 capitalize text-sm text-gray-500">
            @foreach ($game['platforms'] as $platform)
                @if (array_key_exists('abbreviation', $platform))
                    {{ $platform['abbreviation'] }}
                @endif
            @endforeach
        </p>

        <p class="mt-2 capitalize text-sm text-gray-500">
            {{ Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}
        </p>
    </div>
</div>

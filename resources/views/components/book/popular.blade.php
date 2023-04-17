<div class="mt-8">
    <div class="relative inline-block">
        <a href="/book">
            <img src="{{ $book }}" alt="book-cover"
                class="w-52 h-72 rounded-lg shadow-md hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="absolute bottom-0 right-0 w-14 h-14 bg-zinc-100 rounded-full border border-zinc-600 shadow-md" style="right: -20px; bottom: -20px">
            <div class="font-semibold text-lg text-gray-700 flex justify-center items-center h-full">4.5</div>
        </div>
    </div>
    <a href="#" class="block mt-4 text-base font-semibold leading-tight hover:text-zinc-500">
        {{ $slot }}
    </a>
</div>

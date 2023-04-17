<div class="flex bg-zinc-100 rounded-lg shadow-md flex px-6 py-6">
    <div class="relative flex-none">
        <a href="#">
            <img src="{{ $img }}" alt="book-cover"
                class="w-48 h-64 rounded-lg shadow-md hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="absolute bottom-0 right-0 w-14 h-14 bg-zinc-100 rounded-full border border-zinc-600 shadow-md"
            style="right: -20px; bottom: -20px">
            <div class="font-semibold text-lg text-gray-700 flex justify-center items-center h-full">4.5</div>
        </div>
    </div>
    <div class="ml-12">
        <a href="#" class="block mt-4 capitalize text-lg font-semibold leading-tight hover:text-zinc-500">
            {{ $book }}
        </a>

        <p class="mt-6 text-gray-500 hidden md:block lg:block">{{ $slot }}</p>
    </div>
</div>

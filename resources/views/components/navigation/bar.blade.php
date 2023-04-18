<nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
    <div class="flex flex-col lg:flex-row items-center">

        <a href="{{ route('games') }}">
            <div class="px-2 text-2xl uppercase text-gray-700">Game Library</div>
        </a>

        <div class="flex ml-0 lg:ml-16 space-x-8 mt-6 lg:mt-0">

            {{ $slot }}

        </div>
    </div>

    <div class="flex items-center mt-6 lg:mt-0">
        <div clas="relative">
            <div class="flex items-center h-full ml-2">
                <input type="text"
                    class="bg-gray-200 text-sm rounded-full w-64 px-3 py-1 pl-8 border hover:border-gray-400 active:border-gray-400 focus:outline-none focus:border-gray-400"
                    placeholder="Search...">
                <div class="pl-3 absolute">
                    <svg class="fill-current w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                        <path fill="#494c4e"
                            d="M28.828 23.17l-4.285-4.24c-.756-.75-1.765-1.17-2.854-1.17-.354 0-.707.05-1.04.14l-1.39-1.38c1.21-1.7 1.915-3.78 1.915-6.02 0-5.8-4.74-10.5-10.587-10.5S0 4.7 0 10.5 4.74 21 10.587 21c2.128 0 4.114-.63 5.768-1.71l1.452 1.44c-.1.33-.14.68-.14 1.03 0 1.07.412 2.08 1.18 2.83l4.274 4.24c.757.75 1.776 1.17 2.855 1.17 1.08 0 2.087-.42 2.854-1.17 1.56-1.56 1.56-4.1-.002-5.66zM2.018 10.5c0-4.69 3.84-8.5 8.57-8.5s8.57 3.81 8.57 8.5-3.842 8.5-8.57 8.5-8.57-3.81-8.57-8.5zm25.378 16.92c-.786.78-2.067.78-2.853 0l-4.275-4.25c-.383-.37-.585-.87-.585-1.41 0-.54.212-1.04.585-1.41.383-.38.887-.59 1.422-.59.544 0 1.05.21 1.432.59l4.275 4.24c.786.78.786 2.05 0 2.83z" />
                        <path fill="#494c4e"
                            d="M11 16.5c0 .28-.22.5-.5.5h-.01C6.9 16.99 4 14.09 4 10.5S6.9 4.01 10.49 4h.01c.28 0 .5.22.5.5s-.22.5-.5.5h-.01C7.46 5.01 5 7.47 5 10.5s2.46 5.49 5.49 5.5h.01c.28 0 .5.22.5.5z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="ml-6">
            <a href="#">
                <img src="/avatar.png" alt="avatar" class="w-8">
            </a>
        </div>
    </div>
</nav>

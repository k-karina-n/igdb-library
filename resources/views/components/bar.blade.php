<nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
    <div class="flex flex-col lg:flex-row items-center">

        <a href="{{ route('games') }}">
            <div
                class="text-6xl uppercase italic font-bold tracking-wide text-transparent 
                bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                IGDB Library
            </div>
        </a>
    </div>

    <div class="flex items-center mt-6 lg:mt-0">

        {{ $slot }}

        <div class="ml-6">
            <a href="#">
                <img src="/avatar.png" alt="avatar" class="w-8">
            </a>
        </div>
    </div>
</nav>

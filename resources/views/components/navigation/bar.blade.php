<nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
    <div class="flex flex-col lg:flex-row items-center">

        <a href="{{ route('games') }}">
            <div class="px-2 text-2xl uppercase text-white hover:text-dark">Game Library</div>
        </a>

        <div class="flex ml-0 lg:ml-16 space-x-8 mt-6 lg:mt-0">

            {{ $slot }}

        </div>
    </div>
    <div class="flex items-center mt-6 lg:mt-0">

        <x-search-dropdown />

        <div class="ml-6">
            <a href="#">
                <img src="/avatar.png" alt="avatar" class="w-8">
            </a>
        </div>
    </div>

</nav>

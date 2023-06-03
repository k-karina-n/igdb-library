<div class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-14 pb-12">
    @foreach ($popularGames as $game)
        <div class="mt-8 h-80">
            <div class="relative inline-block">
                <x-cover :game=$game class="h-72 w-52" />
            </div>

            <x-game-title :game=$game class="text-base" />
        </div>
    @endforeach
</div>

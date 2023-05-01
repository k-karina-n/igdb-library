<div class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-14 pb-12">
    @foreach ($popularGames as $game)
        <x-game.popular :game="$game" />
    @endforeach
</div>

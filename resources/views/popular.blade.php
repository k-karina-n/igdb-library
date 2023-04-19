<div class="text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-14 border-b border-zinc-500 pb-16">
    @foreach ($popularGames as $game)
        <x-game.popular :game="$game" />
    @endforeach
</div>

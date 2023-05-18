@foreach ($comingGames as $game)
    <x-game.coming :game="$game" />
@endforeach

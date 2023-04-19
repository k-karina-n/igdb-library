@foreach ($reviewedGames as $game)
    <x-game.reviewed :game="$game" />
@endforeach

<?php

namespace App\Services;

use Illuminate\Support\Str;

class FormatGamesService
{
    public function formatPopularGames($games)
    {
        /* @if (array_key_exists('cover', $game)) src="{{ $game['coverImageUrl'] }}"
                @else
                    src="/no-image.jpg" @endif */
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'rating' => isset($game['rating']) ? round($game['rating']) . '%' : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            ]);
        });
    }
}

<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class FormatGamesService
{
    public function formatPopularGames($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'cover' => (array_key_exists('cover', $game)) ?
                    Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : '/no-image.jpg',
                'rating' => isset($game['rating']) ? round($game['rating']) . '%' : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            ]);
        });
    }

    public function formatReviewedGames($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'cover' => (array_key_exists('cover', $game)) ?
                    Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : '/no-image.jpg',
                'rating' => isset($game['rating']) ? round($game['rating']) . '%' : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            ]);
        });
    }

    public function formatComingGames($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'cover' => (array_key_exists('cover', $game)) ?
                    Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) : '/no-image.jpg',
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
                'first_release_date' => Carbon::parse($game['first_release_date'])->format('M d, Y'),
            ]);
        });
    }

    public function formatGameReview($game)
    {
        return collect($game)->merge([
            'cover' => (array_key_exists('cover', $game)) ?
                Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : '/no-image.jpg',
            'genres' => collect($game['genres'])->pluck('name')->implode(', '),
            'involved_companies' => $game['involved_companies'][0]['company']['name'],
            'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            'total_rating' => array_key_exists('total_rating', $game) ? round($game['total_rating']) : 0,
            'total_rating_count' => array_key_exists('total_rating_count', $game) ? round($game['total_rating_count']) : 0,
            'storyline' => array_key_exists('storyline', $game) ? $game['storyline'] : 'Waiting for updates...',
            'videos' => 'https://youtube.com/watch/' . $game['videos'][0]['video_id'],
            'screenshots' => collect($game['screenshots'])->map(function ($screenshot) {
                return [
                    'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                    'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                ];
            })->take(9),
            'similar_games' => $this->formatPopularGames($game['similar_games']),
        ]);
    }
}
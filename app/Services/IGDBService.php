<?php

namespace App\Services;

use App\Services\APIService;
use App\Services\FormatGamesService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use Carbon\Carbon;


class IGDBService
{
    private $before;
    private $current;
    private $after;

    public function __construct(private FormatGamesService $format)
    {
        $this->before = Carbon::now()->subMonths(2)->timestamp;
        $this->current = Carbon::now()->timestamp;
        $this->after = Carbon::now()->addMonths(2)->timestamp;
    }

    private function getPlatformsString(): string
    {
        $platforms = [
            ApiService::PC_PLATFORM,
            ApiService::PS4_PLATFORM,
            ApiService::PS5_PLATFORM,
            ApiService::XONE_PLATFORM,
        ];

        $platforms = implode(',', $platforms);

        return "({$platforms})";
    }

    public function getPopularGames(): Collection
    {
        return Cache::remember('popularGames', now()->addHours(1), function () {
            $platforms = $this->getPlatformsString();

            $response = APIService::url('games')
                ->select([
                    'name',
                    'cover.url',
                    'platforms.abbreviation',
                    'slug',
                    'rating',
                ])->where([
                    ['platforms', '=', $platforms],
                    ['first_release_date', '>=', $this->before],
                    ['first_release_date', '<', $this->after],
                    ['total_rating_count', '>', 5],
                ])->sortDesc('total_rating')
                ->limit(10)
                ->get();

            return collect($response)->map(function ($game) {
                return $this->format->formatPopularGame($game);
            });
        });
    }

    public function getReviewedGames(): Collection
    {
        return Cache::remember('reviewedGames', now()->addHours(1), function () {
            $platforms = $this->getPlatformsString();

            $response = APIService::url('games')
                ->select([
                    'name',
                    'cover.url',
                    'platforms.abbreviation',
                    'total_rating',
                    'slug',
                    'summary'
                ])->where([
                    ['platforms', '=', $platforms,],
                    ['first_release_date', '>=', $this->before],
                    ['first_release_date', '<', $this->current],
                    ['rating_count', '>', 5],
                ])->sortDesc('total_rating')
                ->limit(3)
                ->get();

            return collect($response)->map(function ($game) {
                return $this->format->formatReviewedGames($game);
            });
        });
    }

    public function getComingGames(): Collection
    {
        return Cache::remember('comingGames', now()->addHours(1), function () {
            $platforms = $this->getPlatformsString();

            $response = APIService::url('games')
                ->select([
                    'name',
                    'cover.url',
                    'platforms.abbreviation',
                    'first_release_date',
                    'slug'
                ])->where([
                    ['platforms', '=', $platforms,],
                    ['first_release_date', '>', $this->current],
                ])->sortAsc('first_release_date')
                ->limit(5)
                ->get();

            return collect($response)->map(function ($game) {
                return $this->format->formatComingGames($game);
            });
        });
    }

    public function getGameReview(string $slug): Collection
    {
        $response = APIService::url('games')
            ->select([
                'name',
                'cover.url',
                'genres.name',
                'involved_companies.company.name',
                'platforms.abbreviation',
                'storyline',
                'total_rating', 'total_rating_count',
                'videos.*', 'screenshots.*',
                'slug',
                'similar_games.name', 'similar_games.cover.url', 'similar_games.rating',
                'similar_games.platforms.abbreviation', 'similar_games.slug'
            ])->where([
                ['slug', '=', "\"{$slug}\""],
            ])->get();

        return $this->format->formatGameReview($response[0]);
    }
}

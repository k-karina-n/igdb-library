<?php

namespace App\Services;

use App\Services\APIService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\DataObjects\PopularGameDataObject;
use App\DataObjects\ReviewedGameDataObject;
use App\DataObjects\ComingGameDataObject;
use App\DataObjects\GameReviewDataObject;


class IGDBService
{
    /**
     * Date - two months before current date
     *
     * @var int
     */
    private $before;

    /**
     * Date - current date
     *
     * @var int
     */
    private $current;

    /**
     * Date - two months after current date
     *
     * @var int
     */
    private $after;

    /**
     * Constructor method to set the time
     *
     * @return void
     */
    public function __construct()
    {
        $this->before = Carbon::now()->subMonths(2)->timestamp;
        $this->current = Carbon::now()->timestamp;
        $this->after = Carbon::now()->addMonths(2)->timestamp;
    }

    /**
     * Creates string with game platforms
     *
     * @return string
     */
    private function getPlatformsString(): string
    {
        $platforms = implode(',', [
            ApiService::PC_PLATFORM,
            ApiService::PS4_PLATFORM,
            ApiService::PS5_PLATFORM,
            ApiService::XONE_PLATFORM,
        ]);

        return "({$platforms})";
    }

    /**
     * Sends request to IGDB API Database and caches data for Popular Games section
     *
     * @return Collection
     */
    public function getPopularGames(): Collection
    {
        return Cache::remember('popularGames', now()->addMinutes(1), function () {
            $response = APIService::url('games')
                ->select([
                    'name',
                    'cover.url',
                    'platforms.abbreviation',
                    'slug',
                    'rating',
                ])->where([
                    ['platforms', '=', $this->getPlatformsString()],
                    ['first_release_date', '>=', $this->before],
                    ['first_release_date', '<', $this->after],
                    ['total_rating_count', '>', 5],
                ])->sortDesc('total_rating')
                ->limit(10)
                ->get();

            return collect($response)->map(function ($game) {
                return new PopularGameDataObject(collect($game));
            });
        });
    }

    /**
     * Sends request to IGDB API Database and caches data for Recentrly Reviewed section
     *
     * @return Collection
     */
    public function getReviewedGames(): Collection
    {
        return Cache::remember('reviewedGames', now()->addMinutes(1), function () {
            $response = APIService::url('games')
                ->select([
                    'name',
                    'cover.url',
                    'platforms.abbreviation',
                    'total_rating',
                    'slug',
                    'summary'
                ])->where([
                    ['platforms', '=', $this->getPlatformsString()],
                    ['first_release_date', '>=', $this->before],
                    ['first_release_date', '<', $this->current],
                    ['rating_count', '>', 5],
                ])->sortDesc('total_rating')
                ->limit(3)
                ->get();

            return collect($response)->map(function ($game) {
                return new ReviewedGameDataObject(collect($game));
            });
        });
    }

    /**
     * Sends request to IGDB API Database and caches data for Coming Soon section
     *
     * @return Collection
     */
    public function getComingGames(): Collection
    {
        return Cache::remember('comingGames', now()->addMinutes(1), function () {
            $response = APIService::url('games')
                ->select([
                    'name',
                    'cover.url',
                    'platforms.abbreviation',
                    'first_release_date',
                    'slug'
                ])->where([
                    ['platforms', '=', $this->getPlatformsString()],
                    ['first_release_date', '>', $this->current],
                ])->sortAsc('first_release_date')
                ->limit(5)
                ->get();

            return collect($response)->map(function ($game) {
                return new ComingGameDataObject(collect($game));
            });
        });
    }

    /**
     * Sends request to IGDB API Database and returns data on a clicked game by user
     *
     * @param string $slug
     * 
     * @return GameReviewDataObject
     */
    public function getGameReview(string $slug): GameReviewDataObject
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

        return new GameReviewDataObject(collect($response[0]));
    }
}

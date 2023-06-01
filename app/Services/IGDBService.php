<?php

namespace App\Services;

use App\Services\APIService;
use App\Services\FormatGamesService;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;


class IGDBService
{
    public $before;
    public $current;
    public $after;

    public function __construct(private FormatGamesService $format)
    {
        $this->before = Carbon::now()->subMonths(2)->timestamp;
        $this->current = Carbon::now()->timestamp;
        $this->after = Carbon::now()->addMonths(2)->timestamp;
    }

    public function getPopularGames()
    {
        /* return Cache::remember('popularGames', now()->addHours(1), function () {
            $games = $this->request->getPopularGames();
            return $this->format->formatPopularGames($games);
        }); */
        $games = APIService::url('games')
            ->select([
                'name',
                'cover.url',
                'platforms.abbreviation',
                'slug',
                'rating',
            ])->where([
                "platforms = (6,48,49,167)",
                "& first_release_date >= {$this->before}",
                "& first_release_date < {$this->after}",
                "& total_rating_count > 5"
            ])->sort('total_rating desc')
            ->limit(10)
            ->get();

        return $this->format->formatPopularGames($games);
    }

    public function getReviewedGames()
    {
        /* return Cache::remember('reviewedGames', now()->addHours(1), function () {
            $games = $this->request->getReviewedGames();
            return $this->format->formatReviewedGames($games);
        }); */

        $games = APIService::url('games')
            ->select([
                'name',
                'cover.url',
                'platforms.abbreviation',
                'total_rating',
                'slug',
                'summary'
            ])->where([
                "platforms = (6,48,49,167)",
                "& first_release_date >= {$this->before}",
                "& first_release_date < {$this->current}",
                "& rating_count > 5"
            ])->sort('total_rating desc')
            ->limit(3)
            ->get();

        return $this->format->formatReviewedGames($games);
    }

    public function getComingGames()
    {
        /* return Cache::remember('comingGames', now()->addHours(1), function () {
            $games = $this->request->getReviewedGames();
            return $this->format->formatReviewedGames($games);
        }); */

        $games = APIService::url('games')
            ->select([
                'name',
                'cover.url',
                'platforms.abbreviation',
                'first_release_date',
                'slug'
            ])->where([
                "platforms = (6,48,49,167)",
                "& first_release_date > {$this->current}"
            ])->sort('first_release_date asc')
            ->limit(5)
            ->get();

        return $this->format->formatComingGames($games);
    }

    public function getGameReview(string $slug)
    {
        $game = APIService::url('games')
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
                "slug=\"{$slug}\""
            ])->get();

        return $this->format->formatGameReview($game[0]);
    }
}

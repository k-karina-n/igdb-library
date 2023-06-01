<?php

namespace App\Services;

use App\Services\APIService;
use App\Services\NewAPIService;
use App\Services\FormatGamesService;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;


class IGDBService
{
    public function __construct(
        private APIService $request,
        private FormatGamesService $format,
    ) {
    }

    public function getPopularGames()
    {
        /* return Cache::remember('popularGames', now()->addHours(1), function () {
            $games = $this->request->getPopularGames();
            return $this->format->formatPopularGames($games);
        }); */
        $games = $this->request->getPopularGames();

        return $this->format->formatPopularGames($games);
    }

    public function getReviewedGames()
    {
        /* return Cache::remember('reviewedGames', now()->addHours(1), function () {
            $games = $this->request->getReviewedGames();
            return $this->format->formatReviewedGames($games);
        }); */
        $games = $this->request->getReviewedGames();

        return $this->format->formatReviewedGames($games);
    }

    public function getComingGames()
    {
        /* return Cache::remember('comingGames', now()->addHours(1), function () {
            $games = $this->request->getReviewedGames();
            return $this->format->formatReviewedGames($games);
        }); */

        $games = $this->request->getComingGames();

        return $this->format->formatComingGames($games);
    }

    public function getGameReview(string $slug)
    {
        /* $game = $this->request->getGame($slug);
        return $this->format->formatGameReview($game[0]); */
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        dd(NewAPIService::url('games')
            ->select([
                'name',
                'cover.url',
                'platforms.abbreviation',
                'slug',
                'rating',
            ])->where([
                "platforms = (6,48,49,167)",
                "first_release_date >= {$before}",
                "first_release_date >= {$after}",
                "total_rating_count > 5"
            ])->sort('total_rating desc')
            ->limit(10)->getQueryString());
        /* 
            ->get();
        dd($response); */
    }
}

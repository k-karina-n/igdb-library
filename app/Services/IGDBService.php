<?php

namespace App\Services;

use App\Services\APIRequestService;
use App\Services\FormatGamesService;
use Illuminate\Support\Facades\Cache;

class IGDBService
{
    public function __construct(
        private APIRequestService $request,
        private FormatGamesService $format
    ) {
    }

    public function getPopularGames()
    {
        return Cache::remember('popularGames', now()->addHours(1), function () {
            $games = $this->request->getPopularGames();
            return $this->format->formatPopularGames($games);
        });
    }

    public function getReviewedGames()
    {
        return Cache::remember('reviewedGames', now()->addHours(1), function () {
            $games = $this->request->getReviewedGames();
            return $this->format->formatReviewedGames($games);
        });
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
        $game = $this->request->getGame($slug);

        return $this->format->formatGameReview($game[0]);
    }
}

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
        $games = Cache::remember('popularGames', 10, function () {
            return $this->popular();
        });

        return $games;
    }

    public function popular()
    {
        $games = $this->request->getPopularGames();

        return $this->format->formatPopularGames($games);
    }

    public function getReviewedGames()
    {
        $games = $this->request->getReviewedGames();

        $games = $this->format->formatReviewedGames($games);

        return $games;
    }

    public function getComingGames()
    {
        $games = $this->request->getComingGames();

        $games = $this->format->formatComingGames($games);

        return $games;
    }

    public function getGameReview(string $slug)
    {
        $game = $this->request->getGame($slug);

        $game = $this->format->formatGameReview($game[0]);

        return $game;
    }
}

<?php

namespace App\Services;

use App\Services\APIRequestService;
use App\Services\FormatGamesService;

class IGDBService
{
    public function __construct(
        private APIRequestService $request,
        private FormatGamesService $format
    ) {
    }

    public function getPopularGames()
    {
        $games = $this->request->getPopularGames();

        $games = $this->format->formatPopularGames($games);

        return $games;
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

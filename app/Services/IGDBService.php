<?php

namespace App\Services;

use App\Services\APIRequestService;
use App\Services\FormatGamesService;
use Illuminate\Support\Str;

class IGDBService
{
    private $request;
    private $format;

    public function __construct(APIRequestService $request, FormatGamesService $format)
    {
        $this->request = $request;
        $this->format = $format;
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

        //$game = collect(new GameReviewDataObject($game[0]));

        /* if (!array_key_exists('storyline', $game[0])) {
            $game[0]['storyline'] = 'Waiting for updates...';
        } */

        return $game[0];
    }
}

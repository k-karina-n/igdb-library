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
        return $this->request->getReviewedGames();
    }

    public function getComingGames()
    {
        return $this->request->getComingGames();
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

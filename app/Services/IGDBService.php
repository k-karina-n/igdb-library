<?php

namespace App\Services;

use App\Services\APIRequestService;
use App\DataObjects\GameDataObject;


class IGDBService
{
    private $service;

    public function __construct(APIRequestService $service)
    {
        $this->service = $service;
    }

    public function getPopularGames()
    {
        $games = $this->service->getPopularGames();

        /* foreach ($games as $game) {
            $popularGames[] = new PopularGameDataObject($game);
        } */

        return $games;
    }

    public function getReviewedGames()
    {
        return $this->service->getReviewedGames();
    }

    public function getComingGames()
    {
        return $this->service->getComingGames();
    }

    public function getGameReview(string $slug)
    {
        $game = $this->service->getGame($slug);

        //$game = collect(new GameReviewDataObject($game[0]));

        /* if (!array_key_exists('storyline', $game[0])) {
            $game[0]['storyline'] = 'Waiting for updates...';
        } */

        return $game[0];
    }
}

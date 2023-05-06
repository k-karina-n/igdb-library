<?php

namespace App\Services;

use App\Services\APIRequestService;
use App\Services\DataObjects\PopularGameDataObject;
use App\Services\DataObjects\ReviewedGameDataObject;
use App\Services\DataObjects\ComingGameDataObject;
use App\Services\DataObjects\GameReviewDataObject;


class IGDBService
{
    private $service;

    public function __construct(APIRequestService $service)
    {
        $this->service = $service;
    }

    public function getPopularGames()
    {
        return $this->service->requestPopularGames();
    }

    public function getReviewedGames()
    {
        return $this->service->requestReviewedGames();
    }

    public function getComingGames()
    {
        return $this->service->requestComingGames();
    }

    public function getGameReview(string $slug)
    {
        $game = $this->service->requestGameReview($slug);

        if (!array_key_exists('storyline', $game[0])) {
            $game[0]['storyline'] = 'Waiting for updates...';
        }

        return $game[0];
    }
}

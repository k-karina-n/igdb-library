<?php

namespace App\Services;

use App\Services\APIService;
use App\Services\FormatGamesService;

class SearchService
{
    public function __construct(
        private FormatGamesService $format
    ) {
    }

    public function get($input)
    {
        $results = APIService::url('games')
            ->search($input)
            ->select([
                'name',
                'cover.url',
                'slug'
            ])->limit(5)
            ->get();

        return $this->format->formatSearchResults($results);
    }
}

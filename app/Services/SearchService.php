<?php

namespace App\Services;

use App\Services\APIRequestService;
use App\Services\FormatGamesService;

class SearchService
{
    public function __construct(
        private APIRequestService $request,
        private FormatGamesService $format
    ) {
    }

    public function get($input)
    {
        $results = $this->request->getSearchResults($input);

        return $this->format->formatSearchResults($results);
    }
}

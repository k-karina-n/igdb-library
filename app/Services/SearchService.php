<?php

namespace App\Services;

use App\Services\APIService;
use App\DataObjects\SearchResultDataObject;
use Illuminate\Support\Collection;

class SearchService
{
    /**
     * Sends request to IGDB API Database
     * 
     * @param string $input User search input request 
     * 
     * @return Collection
     */
    public function __invoke(string $input): Collection
    {
        $response = APIService::url('games')
            ->search($input)
            ->select([
                'name',
                'cover.url',
                'slug'
            ])->limit(5)
            ->get();

        return collect($response)->map(function ($game) {
            return new SearchResultDataObject(collect($game));
        });
    }
}

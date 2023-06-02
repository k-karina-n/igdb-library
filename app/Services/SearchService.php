<?php

namespace App\Services;

use App\Services\APIService;
use App\DataObjects\SearchResultDataObject;
use Illuminate\Support\Collection;

class SearchService
{
    public function __invoke($input): Collection
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

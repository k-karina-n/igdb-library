<?php

namespace App\Services;

use App\Services\APIRequestService;
use Illuminate\Support\Str;


class SearchService
{
    private $service;

    public function __construct(APIRequestService $service)
    {
        $this->service = $service;
    }

    public function get($request)
    {
        $search = $this->service->makeRequest("search \"{$request}\"; 
        fields name, slug, cover.url;
        limit 5;");

        $results =  collect($search)->map(function ($game) {
            return collect($game)->merge([
                'cover' => (array_key_exists('cover', $game)) ?
                    Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) : '/no-image.jpg',
            ]);
        });

        return $results;
    }
}

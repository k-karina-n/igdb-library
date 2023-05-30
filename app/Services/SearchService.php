<?php

namespace App\Services;

use App\Services\APIRequestService;
use Illuminate\Support\Str;


class SearchService
{
    public function __construct(private APIRequestService $service)
    {
    }

    public function get($request)
    {
        $results = $this->service->makeRequest("search \"{$request}\"; 
        fields name, slug, cover.url;
        limit 5;");

        if (count($results) == 0) {
            return $results;
        }

        return $this->format($results);
    }

    public function format($results)
    {
        return collect($results)->map(function ($game) {
            return collect($game)->merge([
                'cover' => (array_key_exists('cover', $game)) ?
                    Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) : '/no-image.jpg',
            ]);
        });
    }
}

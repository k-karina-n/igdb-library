<?php

namespace App\Services;

use App\Services\APIRequestService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;



class SearchService
{
    public function __construct(private APIRequestService $service)
    {
    }

    public function get($input)
    {
        $results = $this->service->getSearchResults($input);

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

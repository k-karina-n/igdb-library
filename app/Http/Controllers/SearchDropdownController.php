<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class SearchDropdownController extends Controller
{
    public function get(Request $request)
    {
        $search = $request->search;
        $results = Http::withHeaders(config('services.igdb'))
            ->withBody("search \"{$search}\"; 
            fields name, slug, cover.url;
            limit 5;")
            ->post('https://api.igdb.com/v4/games')
            ->json();

        $results =  collect($results)->map(function ($result) {
            return collect($result)->merge([
                'cover' => (array_key_exists('cover', $result)) ?
                    Str::replaceFirst('thumb', 'cover_small', $result['cover']['url']) : '/no-image.jpg',
            ]);
        });

        return view('components/search-results', [
            'results' => $results
        ]);
    }
}

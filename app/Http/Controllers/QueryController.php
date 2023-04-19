<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class QueryController extends Controller
{
    public function getPopular()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $popularGames = Http::withHeaders(config('services.igdb'))
            ->withBody("fields name, cover.url, platforms.abbreviation, slug, rating; 
            where platforms = (48,49,136,6) 
            & (first_release_date >= {$before}
            & first_release_date < {$after}
            & total_rating_count > 5);
            sort total_rating_count desc;
            limit 10;")->post('https://api.igdb.com/v4/games')
            ->json();

        return view('popular', [
            'popularGames' => $popularGames,
        ]);
    }

    public function getReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current =  Carbon::now()->timestamp;

        $reviewedGames = Http::withHeaders(config('services.igdb'))
            ->withBody("fields name, cover.url, first_release_date, 
            platforms.abbreviation, rating, rating_count, total_rating, summary, slug;
            where platforms = (48,49,136,6)
            & (first_release_date >= {$before}
            & first_release_date < {$current}
            & rating_count > 5);
            sort total_rating desc;
            limit 3;")
            ->post('https://api.igdb.com/v4/games')
            ->json();

        return view('reviewed', [
            'reviewedGames' => $reviewedGames,
        ]);
    }

    public function getComing()
    {
        $current =  Carbon::now()->timestamp;
        $comingGames = Http::withHeaders(config('services.igdb'))
            ->withBody("fields name, cover.url, first_release_date, platforms.abbreviation, slug;
        where platforms = (48,49,136,6)
        & (first_release_date > {$current});
        sort first_release_date asc;
        limit 5;")
            ->post('https://api.igdb.com/v4/games')
            ->json();

        return view('coming', [
            'comingGames' => $comingGames,
        ]);
    }
}

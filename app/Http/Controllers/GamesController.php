<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
            limit 10;")
            ->post('https://api.igdb.com/v4/games')
            ->json();

        $current =  Carbon::now()->timestamp;

        $reviewedGames = Http::withHeaders(config('services.igdb'))
            ->withBody("fields name, cover.url, first_release_date, 
            platforms.abbreviation, rating, rating_count, total_rating, summary;
            where platforms = (48,49,136,6)
            & (first_release_date >= {$before}
            & first_release_date < {$current}
            & rating_count > 5);
            sort total_rating desc;
            limit 3;")
            ->post('https://api.igdb.com/v4/games')
            ->json();

        $comingGames = Http::withHeaders(config('services.igdb'))
            ->withBody("fields name, cover.url, first_release_date, platforms.abbreviation;
            where platforms = (48,49,136,6)
            & (first_release_date >= {$current});
            sort first_release_date asc;
            limit 5;")
            ->post('https://api.igdb.com/v4/games')
            ->json();

        return view('index', [
            'popularGames' => $popularGames,
            'reviewedGames' => $reviewedGames,
            'comingGames' => $comingGames
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

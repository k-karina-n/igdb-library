<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function gameReview($slug)
    {
        $game = Http::withHeaders(config('services.igdb'))
            ->withBody("fields name,cover.url,genres.name,involved_companies.company.name,platforms.abbreviation,storyline,
            total_rating, total_rating_count,
            videos.*,screenshots.*,
            similar_games.name,similar_games.cover.url,similar_games.rating,
            similar_games.platforms.abbreviation,similar_games.slug; 
            where slug=\"{$slug}\";")
            ->post('https://api.igdb.com/v4/games')
            ->json();
        return view('game-review', [
            'game' => $game[0],
        ]);
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

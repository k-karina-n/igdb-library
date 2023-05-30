<?php

namespace App\Http\Controllers;

use App\Services\IGDBService;
use Illuminate\Contracts\View\View;

class GetPopularGamesController extends Controller
{
    public function __invoke(IGDBService $service): View
    {
        return view('popular-section', [
            'popularGames' => $service->getPopularGames(),
        ]);
    }
}

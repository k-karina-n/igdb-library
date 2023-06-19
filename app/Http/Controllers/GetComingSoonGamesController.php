<?php

namespace App\Http\Controllers;

use App\Services\IGDBService;
use Illuminate\Contracts\View\View;

class GetComingSoonGamesController extends Controller
{
    /**
     * Returns Coming Soon games section view with data
     * 
     * @param IGDBService $service
     * 
     * @return View
     */
    public function __invoke(IGDBService $service): View
    {
        return view('coming-section', [
            'comingGames' => $service->getComingGames(),
        ]);
    }
}

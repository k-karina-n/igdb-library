<?php

namespace App\Http\Controllers;

use App\Services\IGDBService;
use Illuminate\Contracts\View\View;

class GetRecentlyReviewedGamesController extends Controller
{
    public function __invoke(IGDBService $service): View
    {
        return view('reviewed-section', [
            'reviewedGames' => $service->getReviewedGames(),
        ]);
    }
}

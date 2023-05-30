<?php

namespace App\Http\Controllers;

use App\Services\IGDBService;
use Illuminate\Contracts\View\View;

class GetRecentlyReviewedGamesController extends Controller
{
    public function __construct(private IGDBService $service)
    {
    }

    public function get(): View
    {
        return view('reviewed-section', [
            'reviewedGames' => $this->service->getReviewedGames(),
        ]);
    }
}

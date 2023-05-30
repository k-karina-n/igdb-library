<?php

namespace App\Http\Controllers;

use App\Services\IGDBService;
use Illuminate\Contracts\View\View;

class GetComingSoonGamesController extends Controller
{
    public function __construct(private IGDBService $service)
    {
    }

    public function get(): View
    {
        return view('coming-section', [
            'comingGames' => $this->service->getComingGames(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\IGDBService;
use Illuminate\Contracts\View\View;

class GetPopularGamesController extends Controller
{
    public function __construct(private IGDBService $service)
    {
    }

    public function get(): View
    {
        return view('popular-section', [
            'popularGames' => $this->service->getPopularGames(),
        ]);
    }
}

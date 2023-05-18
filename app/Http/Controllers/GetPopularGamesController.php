<?php

namespace App\Http\Controllers;

use App\Services\IGDBService;
use Illuminate\Contracts\View\View;

class GetPopularGamesController extends Controller
{
    private $service;

    public function __construct(IGDBService $service)
    {
        $this->service = $service;
    }

    public function get(): View
    {
        return view('popular-section', [
            'popularGames' => $this->service->getPopularGames(),
        ]);
    }
}

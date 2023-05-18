<?php

namespace App\Http\Controllers;

use App\Services\IGDBService;
use Illuminate\Contracts\View\View;

class GetComingSoonGamesController extends Controller
{
    private $service;

    public function __construct(IGDBService $service)
    {
        $this->service = $service;
    }

    public function get(): View
    {
        return view('coming-section', [
            'comingGames' => $this->service->getComingGames(),
        ]);
    }
}

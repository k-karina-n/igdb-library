<?php

namespace App\Http\Controllers;

use App\Services\IGDBService;
use Illuminate\Contracts\View\View;

class MainPageController extends Controller
{
    private $service;

    public function __construct(IGDBService $service)
    {
        $this->service = $service;
    }

    public function getPopularSection(): View
    {
        return view('popular', [
            'popularGames' => $this->service->getPopularGames(),
        ]);
    }

    public function getReviewedSection(): View
    {
        return view('reviewed', [
            'reviewedGames' => $this->service->getReviewedGames(),
        ]);
    }

    public function getComingSection(): View
    {
        return view('coming', [
            'comingGames' => $this->service->getComingGames(),
        ]);
    }
}

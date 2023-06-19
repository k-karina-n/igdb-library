<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Services\IGDBService;

class NavigationController extends Controller
{
    /**
     * Returns Home Page view
     * 
     * @return View
     */
    public function index(): View
    {
        return view('index');
    }

    /**
     * Returns Specific Game Review with data
     * 
     * @param IGDBService $service
     * @param string $slug
     * 
     * @return View
     */
    public function getGameReview(IGDBService $service, string $slug): View
    {
        return view('game-review', [
            'game' => $service->getGameReview($slug),
        ]);
    }
}

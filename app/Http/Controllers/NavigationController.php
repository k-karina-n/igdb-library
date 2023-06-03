<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Services\IGDBService;

class NavigationController extends Controller
{

    public function index(): View
    {
        return view('index');
    }

    public function getGameReview(IGDBService $service, string $slug): View
    {
        return view('game-review', [
            'game' => $service->getGameReview($slug),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Services\IGDBService;

class GetGameController extends Controller
{
    public function get(IGDBService $service, string $slug): View
    {
        return view('game-review', [
            'game' => $service->getGameReview($slug),
        ]);
    }
}

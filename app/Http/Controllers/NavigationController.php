<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class NavigationController extends Controller
{

    public function index(): View
    {
        return view('pages/index');
    }

    public function getReviewsPage(): View
    {
        return view('pages/reviews');
    }

    public function getComingSoonPage(): View
    {
        return view('pages/coming-soon');
    }
}

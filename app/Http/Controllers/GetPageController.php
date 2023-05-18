<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class GetPageController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function getReviewsPage(): View
    {
        return view('index');
    }

    public function getComingSoonPage(): View
    {
        return view('index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;
use Illuminate\Contracts\View\View;


class SearchController extends Controller
{
    public function __construct(private Request $request)
    {
    }

    public function get(SearchService $service): View
    {
        return view('components/search-results', [
            'results' => $service->get($this->request)
        ]);
    }
}

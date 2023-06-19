<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;
use Illuminate\Contracts\View\View;


class SearchController extends Controller
{
    /**
     * Returns Search Results
     * 
     * @param SearchService $service
     * @param Request $request
     * 
     * @return View
     */
    public function __invoke(SearchService $service, Request $request): View
    {
        return view('components/search/results', [
            'results' => $service($request->search)
        ]);
    }
}

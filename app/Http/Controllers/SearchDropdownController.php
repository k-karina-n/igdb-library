<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;
use Illuminate\Contracts\View\View;


class SearchDropdownController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request->search;
    }

    public function get(SearchService $service): View
    {
        return view('components/search-results', [
            'results' => $service->get($this->request)
        ]);
    }
}

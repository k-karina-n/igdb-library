<div class="relative">
    <div>
        <input hx-get="/search" hx-trigger="keyup changed delay:500ms, search" hx-target="#search-results" type="search"
            name="search" placeholder="Search..."
            class="form-control bg-white text-sm rounded-full focus:outline-none focus:shadow-outline w-64 px-3 pl-8 py-1">
    </div>
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg class="fill-current text-gray-400 w-4" viewBox="0 0 24 24">
            <path class="heroicon-ui"
                d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" />
        </svg>
    </div>

    <div id="search-results" class="absolute z-50 w-64 mt-2 bg-white rounded text-xs text-dark">
    </div>
</div>

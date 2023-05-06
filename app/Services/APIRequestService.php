<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class APIRequestService
{
    public $before;
    public $after;
    public $current;

    public function __construct()
    {
        $this->current = Carbon::now()->timestamp;
        $this->before = Carbon::now()->subMonths(2)->timestamp;
        $this->after = Carbon::now()->addMonths(2)->timestamp;
    }

    private function makeRequest($body)
    {
        return Http::withHeaders(config('services.igdb'))
            ->withBody("{$body}")
            ->post('https://api.igdb.com/v4/games')
            ->json();
    }

    public function requestPopularGames(): array
    {
        return $this->makeRequest("fields name, cover.url, platforms.abbreviation, slug, rating; 
        where platforms = (48,49,136,6) 
        & (first_release_date >= {$this->before}
        & first_release_date < {$this->after}
        & total_rating_count > 5);
        sort total_rating_count desc;
        limit 10;");
    }

    public function requestReviewedGames(): array
    {
        return $this->makeRequest("fields name, cover.url, first_release_date, 
        platforms.abbreviation, rating, rating_count, total_rating, summary, slug;
        where platforms = (48,49,136,6)
        & (first_release_date >= {$this->before}
        & first_release_date < {$this->current}
        & rating_count > 5);
        sort total_rating desc;
        limit 3;");
    }

    public function requestComingGames(): array
    {
        return $this->makeRequest("fields name, cover.url, first_release_date, platforms.abbreviation, slug;
        where platforms = (48,49,136,6)
        & (first_release_date > {$this->current});
        sort first_release_date asc;
        limit 5;");
    }

    public function requestGameReview(string $slug): array
    {
        return $this->makeRequest("fields name,cover.url,genres.name,involved_companies.company.name,
            platforms.abbreviation,storyline, total_rating, total_rating_count,videos.*,screenshots.*,
            similar_games.name,similar_games.cover.url,similar_games.rating,
            similar_games.platforms.abbreviation,similar_games.slug; 
            where slug=\"{$slug}\";");
    }
}

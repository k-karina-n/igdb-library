<?php

namespace App\DataObjects;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class GameReviewDataObject
{
    public function __construct(protected Collection $game)
    {
    }

    public function getName(): string
    {
        return $this->game['name'];
    }

    public function getSlug(): string
    {
        return $this->game['slug'];
    }

    public function getCover(): string
    {
        return $this->game['cover'] ?
            Str::replaceFirst('thumb', 'cover_big', $this->game['cover']['url'])
            : '/no-image.jpg';
    }

    public function getPlatforms(): string
    {
        return $this->game['platforms'] ?
            collect($this->game['platforms'])->pluck('abbreviation')->implode(', ')
            : 'Waiting for updates';
    }

    public function getTotalRating(): string
    {
        return $this->game['total_rating'] ?
            round($this->game['total_rating'])
            : 0;
    }

    public function getTotalRatingCount(): string
    {
        return isset($this->game['total_rating_count']) && $this->game['total_rating_count'] <= 100 ?
            round($this->game['total_rating_count'])
            : 0;
    }

    public function getGenres(): string
    {
        return collect($this->game['genres'])->pluck('name')->implode(', ');
    }

    public function getCompanies(): string
    {
        return $this->game['involved_companies'] ?
            $this->game['involved_companies'][0]['company']['name']
            : 'Waiting for updates';
    }

    public function getStoryline(): string
    {
        return $this->game['storyline'] ?
            $this->game['storyline']
            : 'Waiting for updates';
    }

    public function getTrailer(): string
    {
        return $this->game['videos'] ?
            'htps://youtube.com/embed/' . $this->game['videos'][0]['video_id']
            : 'Waiting for updates';
    }

    public function getScreenshots(): Collection
    {
        return collect($this->game['screenshots'])->map(function ($screenshot) {
            return [
                'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
            ];
        })->take(6);
    }

    public function getSimilarGames(): Collection
    {
        return collect($this->game['similar_games'])->map(function ($game) {
            return new PopularGameDataObject(collect($game));
        });
    }
}

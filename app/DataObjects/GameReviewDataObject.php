<?php

namespace App\DataObjects;

use App\DataObjects\GameDataObject;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class GameReviewDataObject extends GameDataObject
{
    public function getTotalRating(): ?string
    {
        return isset($this->game['total_rating']) ?
            round($this->game['total_rating'])
            : 0;
    }

    public function getTotalRatingCount(): ?string
    {
        return isset($this->game['total_rating_count']) && $this->game['total_rating_count'] <= 100 ?
            round($this->game['total_rating_count'])
            : 0;
    }

    public function getGenres(): string
    {
        return isset($this->game['genres']) ?
            collect($this->game['genres'])->pluck('name')->implode(', ')
            : 'Waiting for updates';
    }

    public function getCompanies(): string
    {
        return isset($this->game['involved_companies']) ?
            $this->game['involved_companies'][0]['company']['name']
            : 'Waiting for updates';
    }

    public function getStoryline(): string
    {
        return isset($this->game['storyline']) ?
            $this->game['storyline']
            : 'Waiting for updates';
    }

    public function getTrailer(): string
    {
        return isset($this->game['videos']) ?
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
        })->take(5);
    }
}

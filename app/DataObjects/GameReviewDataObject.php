<?php

namespace App\DataObjects;

use App\DataObjects\GameDataObject;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class GameReviewDataObject extends GameDataObject
{
    /**
     * Returns the game total rating
     * 
     * @return string|null
     */
    public function getTotalRating(): ?string
    {
        return isset($this->game['total_rating']) ?
            round($this->game['total_rating'])
            : 0;
    }

    /**
     * Returns the game total rating count
     * 
     * @return string|null
     */
    public function getTotalRatingCount(): ?string
    {
        return isset($this->game['total_rating_count']) && $this->game['total_rating_count'] <= 100 ?
            round($this->game['total_rating_count'])
            : 0;
    }

    /**
     * Returns the game genres
     * 
     * @return string
     */
    public function getGenres(): string
    {
        return isset($this->game['genres']) ?
            collect($this->game['genres'])->pluck('name')->implode(', ')
            : 'Waiting for updates';
    }

    /**
     * Returns the name of the company that released the game
     * 
     * @return string
     */
    public function getCompany(): string
    {
        return isset($this->game['involved_companies']) ?
            $this->game['involved_companies'][0]['company']['name']
            : 'Waiting for updates';
    }

    /**
     * Returns the game storyline
     * 
     * @return string
     */
    public function getStoryline(): string
    {
        return isset($this->game['storyline']) ?
            $this->game['storyline']
            : 'Waiting for updates';
    }

    /**
     * Returns the link to the game trailer
     * 
     * @return string
     */
    public function getTrailer(): string
    {
        return isset($this->game['videos']) ?
            'htps://youtube.com/embed/' . $this->game['videos'][0]['video_id']
            : 'Waiting for updates';
    }

    /**
     * Returns the game screenshots
     * 
     * @return Collection
     */
    public function getScreenshots(): Collection
    {
        return collect($this->game['screenshots'])->map(function ($screenshot) {
            return [
                'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
            ];
        })->take(6);
    }

    /**
     * Returns information on similar games
     * 
     * @return Collection
     */
    public function getSimilarGames(): Collection
    {
        return collect($this->game['similar_games'])->map(function ($game) {
            return new PopularGameDataObject(collect($game));
        })->take(5);
    }
}

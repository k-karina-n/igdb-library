<?php

namespace App\DataObjects;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SearchResultDataObject
{
    /**
     * Game information
     * 
     * @param Collection $game
     * 
     * @return void
     */
    public function __construct(protected Collection $game)
    {
    }

    /**
     * Returns the game name
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->game['name'];
    }

    /**
     * Returns the game slug
     * 
     * @return string
     */
    public function getSlug(): string
    {
        return $this->game['slug'];
    }

    /**
     * Returns the game cover
     * 
     * @return string
     */
    public function getCover(): string
    {
        return isset($this->game['cover']) ?
            Str::replaceFirst('thumb', 'cover_small', $this->game['cover']['url'])
            : '/no-image.jpg';
    }
}

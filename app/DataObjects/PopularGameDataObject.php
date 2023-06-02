<?php

namespace App\DataObjects;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PopularGameDataObject
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

    public function getRating(): string
    {
        return isset($this->game['rating']) ? round($this->game['rating']) . '%' : null;
    }
}

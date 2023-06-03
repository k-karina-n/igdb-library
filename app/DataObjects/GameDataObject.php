<?php

namespace App\DataObjects;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class GameDataObject
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
        return isset($this->game['cover']) ?
            Str::replaceFirst('thumb', 'cover_big', $this->game['cover']['url'])
            : '/no-image.jpg';
    }

    public function getPlatforms(): string
    {
        return isset($this->game['platforms']) ?
            collect($this->game['platforms'])->pluck('abbreviation')->implode(', ')
            : 'Waiting for updates';
    }
}

<?php

namespace App\DataObjects;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ReviewedGameDataObject
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

    public function getRating(): ?string
    {
        return isset($this->game['total_rating']) ? round($this->game['total_rating']) . '%' : null;
    }

    public function getSummary(): string
    {
        return isset($this->game['summary']) ?
            $this->game['summary']
            : 'Waiting for updates';
    }
}

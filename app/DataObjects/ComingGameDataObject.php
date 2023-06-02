<?php

namespace App\DataObjects;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ComingGameDataObject
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
            Str::replaceFirst('thumb', 'cover_small', $this->game['cover']['url'])
            : '/no-image.jpg';
    }

    public function getPlatforms(): string
    {
        return $this->game['platforms'] ?
            collect($this->game['platforms'])->pluck('abbreviation')->implode(', ')
            : 'Waiting for updates';
    }

    public function getFirstReleaseDate(): string
    {
        return $this->game['first_release_date'] ?
            Carbon::parse($this->game['first_release_date'])->format('M d, Y')
            : 'Waiting for updates';
    }
}

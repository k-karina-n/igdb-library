<?php

namespace App\DataObjects;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SearchResultDataObject
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
}

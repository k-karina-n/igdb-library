<?php

namespace App\DataObjects;

use App\DataObjects\GameDataObject;
use Illuminate\Support\Carbon;

class ComingGameDataObject extends GameDataObject
{
    public function getFirstReleaseDate(): string
    {
        return isset($this->game['first_release_date']) ?
            Carbon::parse($this->game['first_release_date'])->format('M d, Y')
            : 'Waiting for updates';
    }
}

<?php

namespace App\DataObjects;

use App\DataObjects\GameDataObject;

class PopularGameDataObject extends GameDataObject
{
    /**
     * Returns the game rating
     * 
     * @return string|null
     */
    public function getRating(): ?string
    {
        return isset($this->game['rating']) ?
            round($this->game['rating']) . '%'
            : null;
    }
}

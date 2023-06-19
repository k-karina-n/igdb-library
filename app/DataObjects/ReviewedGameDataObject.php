<?php

namespace App\DataObjects;

use App\DataObjects\GameDataObject;

class ReviewedGameDataObject extends GameDataObject
{
    /**
     * Returns the game rating
     * 
     * @return string|null
     */
    public function getRating(): ?string
    {
        return isset($this->game['total_rating']) ? round($this->game['total_rating']) . '%' : null;
    }

    /**
     * Returns the game summary
     * 
     * @return string
     */
    public function getSummary(): string
    {
        return isset($this->game['summary']) ?
            $this->game['summary']
            : 'Waiting for updates';
    }
}

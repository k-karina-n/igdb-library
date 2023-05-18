<?php

namespace App\DataObjects;

class GameDataObject
{
    private $data;
    private $game;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getGame()
    {
        return $this->checkStoryline();
    }

    public function checkStoryline()
    {
        if (!array_key_exists('storyline', $this->data)) {
            $this->game['storyline'] = 'Waiting for updates...';
        }

        return $this->game;
    }
}

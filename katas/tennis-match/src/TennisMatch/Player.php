<?php

namespace TennisMatch;

class Player
{
    private int $score = 0;

    private ?Player $opponent;

    public function __construct(string $name)
    {
        // ...
    }

    public function scorePoint(): void
    {
        if ($this->isDdeuce()) {
            return;
        }

        $this->score++;
    }

    public function setOpponent(Player $opponent): void
    {
        $this->opponent = $opponent;
    }

    public function getScore(): string
    {
        $scores = [
            0 => 'love',
            1 => '15',
            2 => '30',
            3 => '40',
            4 => 'advantage'
        ];

        return $scores[$this->score];
    }

    private function isDdeuce(): bool
    {
        if (!isset($this->opponent)) {
            return false;
        }

        $opponentIsOnForty = $this->opponent->getScore() == '40';
        $thisPlayerIsOnForty = $this->getScore() == '40';

        return $thisPlayerIsOnForty && $opponentIsOnForty;
    }
}

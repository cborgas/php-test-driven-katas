<?php

namespace TennisMatch;

class Player
{
    private string $name;

    private int $score = 0;

    private ?Player $opponent;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function scorePoint(): void
    {
        if ($this->opponentHasAdvantage()) {
            $this->opponent->deuce();
            return;
        } elseif ($this->isDdeuce() == false && $this->getScore() == '40') {
            $this->winGame();
            $this->opponent->loseGame();
            return;
        }

        $this->score++;
    }

    public function loseGame(): void
    {
        $this->score = 0;
    }

    public function winGame(): void
    {
        $this->score = 0;
    }

    public function deuce(): void
    {
        $this->score--;
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

    private function opponentHasAdvantage(): bool
    {
        if (!isset($this->opponent)) {
            return false;
        }   

        return $this->opponent->getScore() == 'advantage';
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

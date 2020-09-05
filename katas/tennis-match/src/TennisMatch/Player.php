<?php declare(strict_types = 1);

namespace TennisMatch;

class Player
{
    private int $score = 0;

    public function __construct(string $name)
    {
        // ...
    }

    public function scorePoint(): void
    {
        $this->score++;
    }

    public function getScore(): string
    {
        $scores = [
            0 => 'love',
            1 => '15 points',
            2 => '30 points',
            3 => '40 points'
        ];

        return $scores[$this->score];
    }
}

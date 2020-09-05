<?php declare(strict_types = 1);

namespace TennisMatch;

class TennisMatch
{
    private Player $playerOne;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $playerOne->setOpponent($playerTwo);
        $playerTwo->setOpponent($playerOne);

        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function getScore(): array
    {
        return [$this->playerOne->getScore(), $this->playerTwo->getScore()];
    }
}

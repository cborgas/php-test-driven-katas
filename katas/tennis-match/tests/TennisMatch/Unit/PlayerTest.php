<?php

namespace TennisMatch\Unit;

use TennisMatch\Player;
use PHPUnit\Framework\Attributes\Test;

class PlayerTest extends \PHPUnit\Framework\TestCase
{
    protected Player $player;

    protected function setUp(): void
    {
        $this->player = new Player("Hugo");
    }

    #[Test]
    public function player_has_name(): void
    {
        $this->assertEquals("Hugo", $this->player->getName());
    }

    #[Test]
    public function player_starts_on_love(): void
    {
        $this->assertEquals('love', $this->player->getScore());
    }

    #[Test]
    public function player_scores_and_goes_to_fifteen_points(): void
    {
        $this->player->scorePoint();
        $this->assertEquals('15', $this->player->getScore());
    }

    #[Test]
    public function player_scores_twice_and_goes_to_thirty_points(): void
    {
        foreach (range(1, 2) as $serve) {
            $this->player->scorePoint();
        }

        $this->assertEquals('30', $this->player->getScore());
    }

    #[Test]
    public function player_scores_thrice_and_goes_to_fourty_points(): void
    {
        foreach (range(1, 3) as $serve) {
            $this->player->scorePoint();
        }

        $this->assertEquals('40', $this->player->getScore());
    }
}

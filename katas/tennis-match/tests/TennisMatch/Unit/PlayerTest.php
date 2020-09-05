<?php

namespace TennisMatch\Unit;

use TennisMatch\Player;

class PlayerTest extends \PHPUnit\Framework\TestCase
{
    protected Player $player;

    protected function setUp(): void
    {
        $this->player = new Player("Hugo");
    }

    /**
     * @test
     */
    public function player_starts_on_love(): void
    {
        $this->assertEquals('love', $this->player->getScore());
    }

    /**
     * @test
     */
    public function player_scores_and_goes_to_fifteen_points(): void
    {
        $this->player->scorePoint();
        $this->assertEquals('15 points', $this->player->getScore());
    }

    /**
     * @test
     */
    public function player_scores_twice_and_goes_to_thirty_points(): void
    {
        foreach (range(1, 2) as $serve) {
            $this->player->scorePoint();
        }

        $this->assertEquals('30 points', $this->player->getScore());
    }

    /**
     * @test
     */
    public function player_scores_thrice_and_goes_to_fourty_points(): void
    {
        foreach (range(1, 3) as $serve) {
            $this->player->scorePoint();
        }

        $this->assertEquals('40 points', $this->player->getScore());
    }
}

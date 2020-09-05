<?php

namespace TennisMatch\Unit;

use TennisMatch\Player;
use TennisMatch\TennisMatch;
use TennisMatch\Game;

class TennisMatchTest extends \PHPUnit\Framework\TestCase
{
    protected Player $playerOne;
    protected Player $playerTwo;
    protected TennisMatch $tennisMatch;

    public function setUp(): void
    {
        $this->playerOne = new Player("Hugo");
        $this->playerTwo = new Player("Humphrey");
        $this->tennisMatch = new TennisMatch(
            $this->playerOne,
            $this->playerTwo
        );
    }

    /**
     * @test
     */
    public function tennis_match_scores_start_at_love(): void
    {
        $this->assertEquals(['love', 'love'], $this->tennisMatch->getScore());
    }

    /**
     * @test
     */
    public function player_one_scores_and_goes_to_fifteen(): void
    {
        $this->playerOne->scorePoint();

        $this->assertEquals(
            ['15', 'love'],
            $this->tennisMatch->getScore()
        );
    }

    /**
     * @test
     */
    public function player_two_scores_and_goes_to_fifteen(): void
    {
        $this->playerTwo->scorePoint();

        $this->assertEquals(
            ['love', '15'],
            $this->tennisMatch->getScore()
        );
    }

     /**
     * @test
     */
    public function player_one_has_advantage_when_scoring_after_deuce(): void
    {
        foreach (range(1, 3) as $i) {
            $this->playerOne->scorePoint();
            $this->playerTwo->scorePoint();
        }

        $this->playerOne->scorePoint();

        $this->assertEquals(
            ['advantage', '40'],
            $this->tennisMatch->getScore()
        );
    }

    /**
     * @test
     */
    public function player_one_scores_at_deuce_then_player_two_scores(): void
    {
        foreach (range(1, 4) as $i) {
            $this->playerOne->scorePoint();
            $this->playerTwo->scorePoint();
        }

        $this->assertEquals(
            ['40', '40'],
            $this->tennisMatch->getScore()
        );
    }

    /**
     * @test
     */
    public function player_one_scores_four_and_ends_the_set(): void
    {
        foreach (range(1, 4) as $i) {
            $this->playerOne->scorePoint();
        }

        $this->assertEquals(
            ['love', 'love'],
            $this->tennisMatch->getScore()
        );
    }
}

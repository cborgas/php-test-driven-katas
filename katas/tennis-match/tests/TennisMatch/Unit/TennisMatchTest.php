<?php 

namespace TennisMatch\Unit;

use TennisMatch\Player;
use TennisMatch\TennisMatch;

class TennisMatchTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function can_start_tennis_match()
    {
        $playerOne = new Player("Hugo");
        $playerTwo = new Player("Humphrey");
        $tennisMatch = new TennisMatch($playerOne, $playerTwo);
    }
}

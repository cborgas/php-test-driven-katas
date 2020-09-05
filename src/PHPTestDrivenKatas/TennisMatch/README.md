# Tennis Match

This kata is about implementing a simple tennis game.
The point system of a tennis match is as follows:

- No points are scored = Love
- 1 point scored = 15 points
- 2 points scored = 30 points
- 3 points scored = 40 points
- 4 points earned = set point (set over) 

For a tennis player to win a game, he/she must win with at least a two point lead.  

If the score is tied at 40 to 40 (what is called as a “Deuce”), a player must earn two consecutive points (an “Advantage” point and “Point”) to win the game. If the player who has an “Advantage” point loses the next point, the score will be “Deuce” once again. 

A set is won when a player has won a minimum of six games with a two game advantage over his opponent, for example, the potential score for a six game set maybe 6 – 0 or 6 – 4 but not 6 - 5. In a scenario where the score is tied at 5 - 5, a player must win 2 consecutive games before he wins a set.  For example, a player may win a set with the score of 7 - 5 or 8 - 6. 
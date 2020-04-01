<?php


namespace SPS;


use SPS\Player\PlayerInterface;

class Utils
{
    /**
     * @param PlayerInterface $player
     * @return int
     */
    public static function calculatePlayerTotalScore(PlayerInterface $player): int
    {
        $total = 0;

        foreach ($player->getScores() as $score) {
            $total += $score->getPoints();
        }

        return $total;
    }

    /**
     * @param array $scores
     * @return string
     */
    public static function outputGameResults(PlayerInterface $playerA, PlayerInterface $playerB): string
    {
        $playerAName = $playerA->getName();
        $playerBName = $playerB->getName();

        $playerATotalScore = Utils::calculatePlayerTotalScore($playerA);
        $playerBTotalScore = Utils::calculatePlayerTotalScore($playerB);

        $playerAScores = $playerA->getScores();
        $playerBScores = $playerB->getScores();

        $results = '';

        foreach ($playerAScores as $round => $score) {
            $results .= sprintf(
                '[Round %d] "%s" plays "%s" and gets "%d" points, "%s" plays "%s" and gets "%d" points',
                $round + 1,
                $playerAName,
                $score->getItem()->getTitle(),
                $score->getPoints(),
                $playerBName,
                $playerBScores[$round]->getItem()->getTitle(),
                $playerBScores[$round]->getPoints()
            ) . PHP_EOL;
        }

        $results .= sprintf(
            '[RESULTS] "%s" score - "%d", "%s" score - "%d". ',
            $playerAName,
            $playerATotalScore,
            $playerBName,
            $playerBTotalScore,
        );

        if ($playerATotalScore == $playerBTotalScore) {
            $results .= 'Draw result!';
        } elseif ($playerATotalScore > $playerBTotalScore) {
            $results .= sprintf('"%s" is the Winner', $playerAName);
        } else {
            $results .= sprintf('"%s" is the Winner', $playerBName);
        }

        $results .= PHP_EOL;

        return $results;
    }
}
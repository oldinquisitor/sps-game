<?php

declare(strict_types=1);

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
     * @param PlayerInterface $playerA
     * @param PlayerInterface $playerB
     */
    public static function outputGameResults(PlayerInterface $playerA, PlayerInterface $playerB): void
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
                '[Round %d]' . PHP_EOL . '"%s" plays "%s" and gets "%d" points' . PHP_EOL . '"%s" plays "%s" and gets "%d" points',
                $round + 1,
                $playerAName,
                $score->getItem()->getTitle(),
                $score->getPoints(),
                $playerBName,
                $playerBScores[$round]->getItem()->getTitle(),
                $playerBScores[$round]->getPoints()
            ) . PHP_EOL . PHP_EOL;
        }

        $results .= sprintf(
            '[RESULTS]' . PHP_EOL . '"%s" score - "%d"' . PHP_EOL . '"%s" score - "%d" ',
                $playerAName,
                $playerATotalScore,
                $playerBName,
                $playerBTotalScore,
            ) . PHP_EOL
        ;

        if ($playerATotalScore == $playerBTotalScore) {
            $results .= 'Draw result!';
        } else {
            $results .= sprintf(
                '"%s" is the Winner',
                $playerATotalScore > $playerBTotalScore
                    ? $playerAName
                    : $playerBName
            );
        }

        echo $results . PHP_EOL;
    }

    public static function outputGameStart(): void
    {
        echo '[GAME HAS BEEN STARTED]' . PHP_EOL . PHP_EOL;
    }

    public static function outputGameFinish(): void
    {
        echo PHP_EOL . '[GAME HAS BEEN FINISHED]' . PHP_EOL;
    }

    /**
     * @param \Exception $exception
     */
    public static function outputError(\Exception $exception): void
    {
        echo '[Error] ' . PHP_EOL . $exception->getMessage() . PHP_EOL . PHP_EOL;
    }
}
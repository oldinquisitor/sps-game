<?php

declare(strict_types=1);

namespace SPS\Player;


use SPS\Item\ItemInterface;
use SPS\Score\Score;
use SPS\Strategy\StrategyInterface;

interface PlayerInterface
{
    /**
     * @return ItemInterface
     */
    public function play(): ItemInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $string
     */
    public function setName(string $string): void;

    /**
     * @return StrategyInterface
     */
    public function getStrategy(): StrategyInterface;

    /**
     * @param StrategyInterface $strategy
     */
    public function setStrategy(StrategyInterface $strategy): void;

    /**
     * @return Score[]
     */
    public function getScores(): array;

    /**
     * @param int $round
     * @return Score|null
     */
    public function getScoreForRound(int $round): ?Score;

    /**
     * @param Score $score
     */
    public function addScore(Score $score): void;
}
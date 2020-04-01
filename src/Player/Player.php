<?php


namespace SPS\Player;


use SPS\Item\ItemInterface;
use SPS\Score\Score;
use SPS\Strategy\StrategyInterface;

class Player implements PlayerInterface
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var StrategyInterface
     */
    private StrategyInterface $strategy;

    /**
     * @var Score[]
     */
    private array $scores;

    /**
     * Player constructor.
     * @param string $name
     * @param StrategyInterface $strategy
     */
    public function __construct(string $name, StrategyInterface $strategy)
    {
        $this->name = $name;
        $this->strategy = $strategy;
    }

    public function play(): ItemInterface
    {
        return $this->strategy->play();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getStrategy(): StrategyInterface
    {
        return $this->strategy;
    }

    public function setStrategy(StrategyInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function getScores(): array
    {
        return $this->scores;
    }

    public function getScoreForRound(int $round): ?Score
    {
        return $this->scores[$round - 1] ?? null;
    }

    public function addScore(Score $score): void
    {
        $this->scores[] = $score;
    }
}
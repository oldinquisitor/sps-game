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

    /**
     * @return ItemInterface
     */
    public function play(): ItemInterface
    {
        return $this->strategy->play();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return StrategyInterface
     */
    public function getStrategy(): StrategyInterface
    {
        return $this->strategy;
    }

    /**
     * @param StrategyInterface $strategy
     */
    public function setStrategy(StrategyInterface $strategy): void
    {
        $this->strategy = $strategy;
    }

    /**
     * @return array
     */
    public function getScores(): array
    {
        return $this->scores;
    }

    /**
     * @param int $round
     * @return Score|null
     */
    public function getScoreForRound(int $round): ?Score
    {
        return $this->scores[$round - 1] ?? null;
    }

    /**
     * @param Score $score
     */
    public function addScore(Score $score): void
    {
        $this->scores[] = $score;
    }
}
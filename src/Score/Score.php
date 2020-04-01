<?php


namespace SPS\Score;


use SPS\Item\ItemInterface;

class Score implements ScoreInterface
{
    /**
     * @var ItemInterface
     */
    private ItemInterface $item;

    /**
     * @var int
     */
    private int $points;

    /**
     * Score constructor.
     * @param ItemInterface $item
     * @param int $points
     */
    public function __construct(ItemInterface $item, int $points)
    {
        $this->item = $item;
        $this->points = $points;
    }

    /**
     * @return ItemInterface
     */
    public function getItem(): ItemInterface
    {
        return $this->item;
    }

    /**
     * @param ItemInterface $item
     */
    public function setItem(ItemInterface $item): void
    {
        $this->item = $item;
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @param int $points
     */
    public function setPoints(int $points): void
    {
        $this->points = $points;
    }
}
<?php

declare(strict_types=1);

namespace SPS\Score;


use SPS\Item\ItemInterface;

interface ScoreInterface
{
    /**
     * @return ItemInterface
     */
    public function getItem(): ItemInterface;

    /**
     * @param ItemInterface $item
     */
    public function setItem(ItemInterface $item): void;

    /**
     * @return int
     */
    public function getPoints(): int;

    /**
     * @param int $points
     */
    public function setPoints(int $points): void;
}
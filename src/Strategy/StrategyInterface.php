<?php


namespace SPS\Strategy;


use SPS\Item\ItemInterface;

interface StrategyInterface
{
    /**
     * @return ItemInterface
     */
    public function play(): ItemInterface;

    /**
     * @return array
     */
    public function getItems(): array;

    /**
     * @param mixed ...$items
     */
    public function setItems(...$items): void;
}
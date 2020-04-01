<?php


namespace SPS\Strategy;


use SPS\Item\ItemInterface;

class Strategy implements StrategyInterface
{
    /**
     * @var ItemInterface[]
     */
    private $items = [];

    /**
     * Strategy constructor.
     * @param mixed ...$items
     */
    public function __construct(...$items)
    {
        $this->items = $items;
    }

    /**
     * @return ItemInterface
     */
    public function play(): ItemInterface
    {
        return $this->items[array_rand($this->items)];
    }
}
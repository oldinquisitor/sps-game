<?php

declare(strict_types=1);

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
     * @param ItemInterface[] ...$items
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

    /**
     * @return ItemInterface[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param mixed ...$items
     */
    public function setItems(...$items): void
    {
        $this->items = $items;
    }
}
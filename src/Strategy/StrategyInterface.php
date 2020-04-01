<?php


namespace SPS\Strategy;


use SPS\Item\ItemInterface;

interface StrategyInterface
{
    /**
     * @return ItemInterface
     */
    public function play(): ItemInterface;
}
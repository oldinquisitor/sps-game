<?php


namespace SPS\Rule;


use SPS\Item\ItemInterface;

interface RuleInterface
{
    /**
     * @param ItemInterface $itemA
     * @param ItemInterface $itemB
     * @return int|null
     */
    public function apply(ItemInterface $itemA, ItemInterface $itemB): ?int;
}
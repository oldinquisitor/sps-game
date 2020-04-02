<?php

declare(strict_types=1);

namespace SPS\Rule;


use SPS\Item\ItemInterface;

class Rule implements RuleInterface
{
    public const RESULT_A_HITS_B = 1;
    public const RESULT_B_HITS_A = -1;
    public const RESULT_DRAW = 0;

    /**
     * @var array
     */
    private $items = [];

    /**
     * Rule constructor.
     * @param ItemInterface $winnerItem
     * @param ItemInterface $looserItem
     */
    public function __construct(ItemInterface $winnerItem, ItemInterface $looserItem)
    {
        $this->items = [$winnerItem, $looserItem];
    }

    /**
     * @param ItemInterface $itemA
     * @param ItemInterface $itemB
     * @return int|null
     */
    public function apply(ItemInterface $itemA, ItemInterface $itemB): ?int
    {
        if ($itemA == $itemB) {
            return self::RESULT_DRAW;
        }

        if (in_array($itemA, $this->items) && in_array($itemB, $this->items)) {
            return array_search($itemA, $this->items) < array_search($itemB, $this->items)
                ? self::RESULT_A_HITS_B
                : self::RESULT_B_HITS_A
            ;
        }

        return null;
    }
}
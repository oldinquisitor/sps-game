<?php

declare(strict_types=1);

namespace SPS\Rule;


use SPS\Item\ScissorsItem;
use SPS\Item\StoneItem;

class StoneHitsScissorsFactory implements RuleFactoryInterface
{
    /**
     * @return Rule
     */
    public static function makeRule(): Rule
    {
        return new Rule(new StoneItem(), new ScissorsItem());
    }
}
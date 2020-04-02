<?php

declare(strict_types=1);

namespace SPS\Rule;


use SPS\Item\PaperItem;
use SPS\Item\StoneItem;

class PaperHitsStoneRuleFactory implements RuleFactoryInterface
{
    /**
     * @return Rule
     */
    public static function makeRule(): Rule
    {
        return new Rule(new PaperItem(), new StoneItem());
    }
}
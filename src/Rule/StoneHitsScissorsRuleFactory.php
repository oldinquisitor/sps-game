<?php

declare(strict_types=1);

namespace SPS\Rule;


use SPS\Container;

class StoneHitsScissorsRuleFactory implements RuleFactoryInterface
{
    /**
     * @return Rule
     * @throws \Exception
     */
    public static function makeRule(): Rule
    {
        return new Rule(Container::getService('sps.item.stone_item'), Container::getService('sps.item.scissors_item'));
    }
}
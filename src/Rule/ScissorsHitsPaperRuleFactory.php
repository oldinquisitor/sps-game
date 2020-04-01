<?php


namespace SPS\Rule;


use SPS\Item\PaperItem;
use SPS\Item\ScissorsItem;

class ScissorsHitsPaperRuleFactory implements RuleFactoryInterface
{
    /**
     * @return Rule
     */
    public static function makeRule(): Rule
    {
        return new Rule(new ScissorsItem(), new PaperItem());
    }
}
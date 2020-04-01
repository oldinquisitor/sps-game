<?php


namespace SPS\Rule;


interface RuleFactoryInterface
{
    /**
     * @return Rule
     */
    public static function makeRule(): Rule;
}
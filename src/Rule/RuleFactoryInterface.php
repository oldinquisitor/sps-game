<?php

declare(strict_types=1);

namespace SPS\Rule;


interface RuleFactoryInterface
{
    /**
     * @return Rule
     */
    public static function makeRule(): Rule;
}
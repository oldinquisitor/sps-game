<?php

declare(strict_types=1);

namespace SPS;


use PHPUnit\Framework\TestCase;
use SPS\Item\PaperItem;
use SPS\Item\StoneItem;
use SPS\Rule\Rule;

final class RuleTest extends TestCase
{
    public function testRule(): void
    {
        $rule = new Rule(new PaperItem(), new StoneItem());

        $itemA = new PaperItem();
        $itemB = new PaperItem();
        $this->assertEquals(Rule::RESULT_DRAW, $rule->apply($itemA, $itemB), 'Draw result is expected');

        $itemA = new PaperItem();
        $itemB = new StoneItem();
        $this->assertEquals(Rule::RESULT_A_HITS_B, $rule->apply($itemA, $itemB), 'A hits B result is expected');

        $itemA = new StoneItem();
        $itemB = new PaperItem();
        $this->assertEquals(Rule::RESULT_B_HITS_A, $rule->apply($itemA, $itemB), 'B hits A result is expected');
    }
}
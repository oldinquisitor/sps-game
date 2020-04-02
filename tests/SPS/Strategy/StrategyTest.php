<?php

declare(strict_types=1);

namespace Tests\SPS\Strategy;


use PHPUnit\Framework\TestCase;
use SPS\Item\ScissorsItem;
use SPS\Item\StoneItem;
use SPS\Strategy\Strategy;

class StrategyTest extends TestCase
{
    public function testStrategy(): void
    {
        $stoneItem = new StoneItem();
        $scissorsItem = new ScissorsItem();
        $strategy = new Strategy($stoneItem, $scissorsItem);

        for ($i = 0; $i < 10; $i++) {
            $items = $strategy->getItems();
            $item = $strategy->play();

            $this->assertContains($item, $items, 'Strategy is incorrect');
        }

        $scissorsItem = new ScissorsItem();
        $strategy->setItems($scissorsItem);
        $this->assertCount(1, $strategy->getItems(), 'Strategy items count is incorrect after changing');
        $this->assertContains($item, $items, 'Strategy is incorrect after changing');
    }
}
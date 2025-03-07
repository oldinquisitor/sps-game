<?php

declare(strict_types=1);

namespace SPS;


use PHPUnit\Framework\TestCase;
use SPS\Item\PaperItem;
use SPS\Item\ScissorsItem;
use SPS\Item\StoneItem;

final class ItemTest extends TestCase
{
    private const MESSAGE = 'Item doesn\'t have title';

    public function testItems(): void
    {
        $paperItem = new PaperItem();
        $this->assertIsString($paperItem->getTitle(), self::MESSAGE);

        $stoneItem = new StoneItem();
        $this->assertIsString($stoneItem->getTitle(), self::MESSAGE);

        $scissorsItem = new ScissorsItem();
        $this->assertIsString($scissorsItem->getTitle(), self::MESSAGE);
    }
}
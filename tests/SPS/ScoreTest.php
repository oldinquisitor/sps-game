<?php

declare(strict_types=1);

namespace SPS;


use PHPUnit\Framework\TestCase;
use SPS\Item\ScissorsItem;
use SPS\Item\StoneItem;
use SPS\Score\Score;

final class ScoreTest extends TestCase
{
    public function testScore(): void
    {
        $item = new StoneItem();
        $points = 1;
        $score = new Score($item, $points);

        $this->assertEquals($points, $score->getPoints(), 'Score points are incorrect');
        $this->assertInstanceOf(StoneItem::class, $score->getItem(), 'Score item is incorrect');

        $newItem = new ScissorsItem();
        $score->setItem($newItem);
        $this->assertInstanceOf(ScissorsItem::class, $score->getItem(), 'Score item changing is incorrect');

        $newPoints = 0;
        $score->setPoints($newPoints);
        $this->assertEquals($newPoints, $score->getPoints(), 'Score points changing is incorrect');
    }
}
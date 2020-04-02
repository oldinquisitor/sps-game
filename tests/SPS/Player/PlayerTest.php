<?php

declare(strict_types=1);

namespace Tests\SPS\Player;


use PHPUnit\Framework\TestCase;
use SPS\Item\PaperItem;
use SPS\Item\ScissorsItem;
use SPS\Item\StoneItem;
use SPS\Player\Player;
use SPS\Player\PlayerInterface;
use SPS\Score\Score;
use SPS\Strategy\Strategy;
use SPS\Strategy\StrategyInterface;
use SPS\Utils;

class PlayerTest extends TestCase
{
    private PlayerInterface $player;

    protected function setUp(): void
    {
        $this->player = new Player('Player', new Strategy(new PaperItem(), new StoneItem()));
    }

    public function testPlayerBaseSettings(): void
    {
        $this->assertIsString($this->player->getName(), 'Player name isn\'t a string');
        $this->assertInstanceOf(StrategyInterface::class,  $this->player->getStrategy(), 'Player doesn\'t have strategy');

        $newName = 'Player1';
        $this->player->setName($newName);
        $this->assertEquals($newName, $this->player->getName(), 'Player\'s name hasn\'t been changed');

        $newStrategy = new Strategy(new ScissorsItem());
        $this->player->setStrategy($newStrategy);
        $this->assertEquals($newStrategy, $this->player->getStrategy(), 'Player\'s strategy hasn\'t been changed');
    }

    public function testPlayerGame(): void
    {
        $item = new StoneItem();
        $strategy = new Strategy($item);
        $this->player->setStrategy($strategy);
        $this->assertInstanceOf(StoneItem::class, $this->player->play(), 'Strategy item is incorrect');

    }

    public function testPlayerScores(): void
    {
        $points = 1;
        $score = new Score(new ScissorsItem(), $points);
        $this->player->addScore($score);

        $this->assertEquals($points, Utils::calculatePlayerTotalScore($this->player), 'Player\'s score incorrect');
        $this->assertEquals($score, $this->player->getScoreForRound(1), 'Scores are incorrect');
        $this->assertEquals([$score], $this->player->getScores(), 'Player\'s score is incorrect');
    }
}
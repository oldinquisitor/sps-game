<?php

declare(strict_types=1);

namespace Tests\SPS\Game;


use PHPUnit\Framework\TestCase;
use SPS\Game\Exception as GameException;
use SPS\Game\Game;
use SPS\Game\GameInterface;
use SPS\Player\PaperStrategyPlayerFactory;
use SPS\Player\Player;
use SPS\Player\PlayerInterface;
use SPS\Player\RandomStrategyPlayerFactory;
use SPS\Rule\PaperHitsStoneRuleFactory;
use SPS\Rule\ScissorsHitsPaperRuleFactory;
use SPS\Rule\StoneHitsScissorsFactory;
use SPS\Strategy\Strategy;

class GameTest extends TestCase
{
    private GameInterface $game;

    private PlayerInterface $playerA;

    private PlayerInterface $playerB;

    protected function setUp(): void
    {
        $this->initGame();
        $this->addPlayers();
        $this->addRules();
    }

    public function testGamePlayers(): void
    {
        $this->expectException(GameException::class);
        $player = new Player('', new Strategy());
        $this->game->addPlayer($player);
        $this->game->start();

        $player = new Player('Test', null);
        $this->game->addPlayer($player);
        $this->game->start();

        $player = new Player('Test', new Strategy());
        $this->game->addPlayer($player);
        $this->game->start();

        $this->initGame();
        $this->addPlayers();
        $this->game->start();
    }

    public function testGameRules(): void
    {
        $this->expectException(GameException::class);
        $this->initGame();
        $this->addPlayers();
        $this->game->start();
    }

    public function testGameRounds()
    {
        $this->expectException(GameException::class);
        $this->setUp();
        $this->game->setRounds(0);
        $this->game->start();
    }

    private function initGame()
    {
        $this->game = new Game();
        $this->playerA = PaperStrategyPlayerFactory::makePlayer();
        $this->playerB = RandomStrategyPlayerFactory::makePlayer();
    }

    private function addPlayers()
    {
        $this->game->addPlayer($this->playerA);
        $this->game->addPlayer($this->playerB);
    }

    private function addRules()
    {
        $this->game->addRule(PaperHitsStoneRuleFactory::makeRule());
        $this->game->addRule(StoneHitsScissorsFactory::makeRule());
        $this->game->addRule(ScissorsHitsPaperRuleFactory::makeRule());
    }
}
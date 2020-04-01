<?php

require __DIR__ . '/vendor/autoload.php';

use SPS\Game;
use SPS\Player\PaperStrategyPlayerFactory;
use SPS\Player\RandomStrategyPlayerFactory;
use SPS\Rule\PaperHitsStoneRuleFactory;
use SPS\Rule\ScissorsHitsPaperRuleFactory;
use SPS\Rule\StoneHitsScissorsFactory;
use SPS\Utils;


$playerA = PaperStrategyPlayerFactory::makePlayer();
$playerB = RandomStrategyPlayerFactory::makePlayer();

$game = new Game(100);

try {
    $game->addPlayer($playerA);
    $game->addPlayer($playerB);

    $game->addRule(PaperHitsStoneRuleFactory::makeRule());
    $game->addRule(StoneHitsScissorsFactory::makeRule());
    $game->addRule(ScissorsHitsPaperRuleFactory::makeRule());

    $game->start();

    $playerAScore = Utils::calculatePlayerTotalScore($playerA);
    $playerBScore = Utils::calculatePlayerTotalScore($playerB);

    echo Utils::outputGameResults($playerA, $playerB) . PHP_EOL;
} catch (\Exception $exception) {
    echo '[Error] ' . $exception->getMessage() . PHP_EOL;
}

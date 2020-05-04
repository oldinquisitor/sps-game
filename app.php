<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use SPS\Container;
use SPS\Utils;

Utils::outputGameStart();

try {
    Container::getService('sps.game.game')->start();

    Utils::outputGameResults(Container::getService('sps.player.player_a'), Container::getService('sps.player.player_b'));
} catch (Exception $exception) {
    Utils::outputError($exception);
}

Utils::outputGameFinish();

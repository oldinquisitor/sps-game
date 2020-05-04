<?php

declare(strict_types=1);

namespace SPS\Player;


use SPS\Container;

class PaperStrategyPlayerFactory implements PlayerFactoryInterface
{
    /**
     * @return PlayerInterface
     * @throws \Exception
     */
    public static function makePlayer(): PlayerInterface
    {
        return new Player('Player A', Container::getService('sps.strategy.strategy_paper'));
    }
}
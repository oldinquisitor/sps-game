<?php

declare(strict_types=1);

namespace SPS\Player;


use SPS\Item\PaperItem;
use SPS\Strategy\Strategy;

class PaperStrategyPlayerFactory implements PlayerFactoryInterface
{
    /**
     * @return PlayerInterface
     */
    public static function makePlayer(): PlayerInterface
    {
        return new Player('Player A', new Strategy(new PaperItem()));
    }
}
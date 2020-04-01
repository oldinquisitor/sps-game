<?php


namespace SPS\Player;


use SPS\Item\PaperItem;
use SPS\Item\ScissorsItem;
use SPS\Item\StoneItem;
use SPS\Strategy\Strategy;

class RandomStrategyPlayerFactory implements PlayerFactoryInterface
{
    /**
     * @return PlayerInterface
     */
    public static function makePlayer(): PlayerInterface
    {
        return new Player('Player B', new Strategy(new PaperItem(), new StoneItem(), new ScissorsItem()));
    }
}
<?php


namespace SPS\Player;


interface PlayerFactoryInterface
{
    /**
     * @return PlayerInterface
     */
    public static function makePlayer(): PlayerInterface;
}
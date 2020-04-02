<?php

declare(strict_types=1);

namespace SPS\Player;


interface PlayerFactoryInterface
{
    /**
     * @return PlayerInterface
     */
    public static function makePlayer(): PlayerInterface;
}
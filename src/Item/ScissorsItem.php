<?php

declare(strict_types=1);

namespace SPS\Item;


class ScissorsItem implements ItemInterface
{
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Scissors';
    }
}
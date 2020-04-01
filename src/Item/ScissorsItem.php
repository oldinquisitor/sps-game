<?php


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
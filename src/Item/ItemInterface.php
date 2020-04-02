<?php

declare(strict_types=1);

namespace SPS\Item;


interface ItemInterface
{
    /**
     * @return string
     */
    public function getTitle(): string;
}
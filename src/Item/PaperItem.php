<?php

declare(strict_types=1);

namespace SPS\Item;


class PaperItem implements ItemInterface
{
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Paper';
    }
}
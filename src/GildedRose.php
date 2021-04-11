<?php

namespace App;

class GildedRose
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItem($which = null)
    {
        return ($which === null
            ? $this->items
            : $this->items[$which]
        );
    }

    public function nextDay()
    {
        foreach ($this->items as $item) {
            if ($item instanceof AbstractItem) {
                // delegate the next day processing to each item
                $item->nextDay();
            } else {
                // TODO - log an error but keep processing other items
            }
        }
    }
}
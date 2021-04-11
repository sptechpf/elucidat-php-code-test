<?php

namespace App;

class SulfurasItem extends AbstractItem
{
    const ITEM_NAME = 'Sulfuras, Hand of Ragnaros';

    /**
     * {@inheritdoc}
     */
    public function nextDay()
    {
        // "Sulfuras", being a legendary item, never has to be sold or decreases in Quality
        // nothing to be done here
    }
}
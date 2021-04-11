<?php

namespace App;

class AgedBrieItem extends AbstractItem
{
    const ITEM_NAME = 'Aged Brie';

    /**
     * {@inheritdoc}
     */
    public function nextDay()
    {
        $this->decreaseSellIn();

        // "Aged Brie" actually increases in Quality the older it gets
        $this->increaseQualityBy($this->calculateQualityNumberChange());
    }

    /**
     * Calculates by how much the quality changes
     *
     * @return int Quality change number
     */
    private function calculateQualityNumberChange() :int
    {
        // Once the sell by date has passed, Quality changes twice as fast
        return $this->isAfterSellDate() ? 2 : 1;
    }
}
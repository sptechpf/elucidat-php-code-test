<?php

namespace App;

class NormalItem extends AbstractItem
{
    const ITEM_NAME = 'normal';

    /**
     * {@inheritdoc}
     */
    public function nextDay()
    {
        $this->decreaseSellIn();

        // Normal item decrease in Quality the older it gets
        $this->decreaseQualityBy($this->calculateQualityNumberChange());
    }

    /**
     * Calculates by how much the quality changes
     *
     * @return int Quality change number
     */
    protected function calculateQualityNumberChange() :int
    {
        // Once the sell by date has passed, Quality changes twice as fast
        return $this->isAfterSellDate() ? 2 : 1;
    }
}
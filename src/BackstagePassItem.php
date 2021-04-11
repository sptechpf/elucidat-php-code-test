<?php

namespace App;

class BackstagePassItem extends AbstractItem
{
    const ITEM_NAME = 'Backstage passes to a TAFKAL80ETC concert';

    /**
     * {@inheritdoc}
     */
    public function nextDay()
    {
        $this->decreaseSellIn();

        if ($this->isAfterSellDate()) {
            // Quality drops to 0 after the concert
            $this->removeQuality();
        } else {
            // otherwise increases
            $this->increaseQualityBy($this->calculateQualityNumberChange());
        }
    }

    /**
     * Calculates by how much the quality changes
     *
     * @return int Quality change number
     */
    private function calculateQualityNumberChange() :int
    {
        // quality increases as its sell date approaches
        if ($this->sellIn < 5) {
            // increases by 3 when there are 5 days or less
            return 3;
        }

        if ($this->sellIn < 10) {
            // increases by 2 when there are 10 days or less
            return 2;
        }

        // otherwise increases by 1
        return 1;
    }
}
<?php

namespace App;

class ConjuredManaCakeItem extends NormalItem
{
    const ITEM_NAME = 'Conjured Mana Cake';

    /**
     * {@inheritdoc}
     */
    protected function calculateQualityNumberChange() :int
    {
        // "Conjured" items degrade in Quality twice as fast as normal items
        return parent::calculateQualityNumberChange()*2;
    }
}
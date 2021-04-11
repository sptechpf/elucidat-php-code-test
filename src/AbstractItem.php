<?php

namespace App;

abstract class AbstractItem extends Item
{
    /**
     * Constructor
     */
    public function __construct(int $quality, int $sellIn)
    {
        parent::__construct(static::ITEM_NAME, $quality, $sellIn);
    }

    /**
     * Performs next day action. Each item must implement this method and decide how it handles it.
     */
    abstract public function nextDay();

    /**
     * Get name of the item
     *
     * @return string Item name
     */
    public function getName() :string
    {
        return $this->name;
    }

    /**
     * Get quality of the item
     *
     * @return int Item quality value
     */
    public function getQuality() :int
    {
        return $this->quality;
    }

    /**
     * Get sell in value of the item
     *
     * @return int Item sell in value
     */
    public function getSellIn() :int
    {
        return $this->sellIn;
    }

    /**
     * Is the item after its sell date
     *
     * @return bool
     */
    protected function isAfterSellDate() :bool
    {
        return $this->sellIn < 0;
    }

    /**
     * Removes quality value of the item
     *
     * @return self
     */
    protected function removeQuality() :self
    {
        $this->quality = 0;

        return $this;
    }

    /**
     * Decreases quality value by a given number (takes care of a minimum quality value)
     *
     * @return self
     */
    protected function decreaseQualityBy(int $number) :self
    {
        $this->quality -= $number;

        if ($this->quality < 0) {
            // The Quality of an item is never negative
            $this->quality = 0;
        }

        return $this;
    }

    /**
     * Increases quality value by a given number (takes care of a maximum quality value)
     *
     * @return self
     */
    protected function increaseQualityBy(int $number) :self
    {
        $this->quality += $number;

        if ($this->quality > 50) {
            // The Quality of an item is never more than 50
            $this->quality = 50;
        }

        return $this;
    }

    /**
     * Decreases sellIn value by 1
     *
     * @return self
     */
    protected function decreaseSellIn() :self
    {
        $this->sellIn--;

        return $this;
    }
}
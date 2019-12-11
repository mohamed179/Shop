<?php

namespace App;

use BaklySystems\LaravelShop\Models\ShopItemModel;

class Item extends ShopItemModel
{
    /**
     * Get the item's type.
     *
     * @return string
     */
    public function getTypeAttribute () {
        return substr($this->class,4);
    }
}
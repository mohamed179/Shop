<?php

namespace App;

use BaklySystems\LaravelShop\Traits\ShopItemTrait;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use ShopItemTrait;

    /**
     * Custom field name to define the item's name.
     * @var string
     */
    protected $itemName = 'model';

    /**
     * Name of the route to generate the item url.
     *
     * @var string
     */
    protected $itemRouteName = 'mobiles';

    /**
     * Name of the attributes to be included in the route params.
     *
     * @var string
     */
    protected $itemRouteParams = ['id'];

    /**
     * Get the book's name.
     *
     * @return string
     */
    public function getNameAttribute () {
        return $this->model;
    }

    /**
     * Set the book's name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['model'] = $value;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\LaravelShop\Traits\ShopItemTrait;

class Book extends Model
{
    use ShopItemTrait;

    /**
     * Custom field name to define the item's name.
     * @var string
     */
    protected $itemName = 'title';

    /**
     * Name of the route to generate the item url.
     *
     * @var string
     */
    protected $itemRouteName = 'books';

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
        return $this->title;
    }

    /**
     * Set the book's name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['title'] = $value;
    }
}

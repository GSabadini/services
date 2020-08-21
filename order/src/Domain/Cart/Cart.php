<?php

namespace App\Model\Cart;

/**
 * Class Cart
 *
 * @package App\Model\Cart
 */
final class Cart
{
    /**
     * @var Item
     */
    private $items;

    /**
     * Cart constructor.
     *
     * @param Item $items
     */
    public function __construct(Item $items)
    {
        $this->items = $items;
    }
}

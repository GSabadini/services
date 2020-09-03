<?php
declare(strict_types=1);

namespace App\Domain\Cart\Entity;

/**
 * Class Cart
 *
 * @package App\Domain\Entity\Cart
 */
final class Cart
{
    /**
     * @var Item
     */
    private Item $item;

    /**
     * Cart constructor.
     *
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }
}

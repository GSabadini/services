<?php

namespace App\Model\Cart;

/**
 * Class Item
 *
 * @package App\Model\Cart
 */
final class Item
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var
     */
    private $quantity;

    /**
     * @var float
     */
    private $unitPrice;

    /**
     * Item constructor.
     *
     * @param string $description
     * @param $quantity
     * @param float  $unitPrice
     */
    public function __construct(string $description, $quantity, float $unitPrice)
    {
        $this->description = $description;
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }
}

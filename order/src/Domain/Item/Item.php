<?php

namespace App\Domain\Item;

/**
 * Class Item
 * @package App\Domain\Item
 */
final class Item
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $quantity;

    /**
     * Item constructor.
     * @param $id
     * @param $description
     * @param $price
     * @param $quantity
     */
    public function __construct(string $id, string $description, int $quantity, int $price)
    {
        $this->id = $id;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function total()
    {
        return $this->quantity * $this->price;
    }

    public function serialize(): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ];
    }
}

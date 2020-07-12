<?php

namespace App\Domain\Order;

use App\Domain\Item\Item;

/**
 * Class Order
 * @package App\Domain\Order
 */
final class Order
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var array
     */
    private $items;
    /**
     * @var int
     */
    private $total;

    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $typePayment;

    /**
     * Order constructor.
     * @param array $items
     * @param string $description
     * @param string $typePayment
     * @param int $total
     */
    public function __construct(array $items, string $description, string $typePayment)
    {
        $this->id = "id";
        $this->items = $items;
        $this->description = $description;
        $this->typePayment = $typePayment;
//        $this->total = $total;
    }

    /**
     * @param Item $item
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return int
     */
    public function total(): int
    {
        foreach ($this->items as $item) {
            $this->total += $item->total();
        }

        return $this->total;
    }

    /**
     * @return array
     */
    public function serialize(): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'items' => $this->itemSerialize(),
            'type_payment' => $this->typePayment,
            'total' => $this->total(),
        ];
    }

    /**
     * @return array
     */
    public function itemSerialize(): array
    {
        $json = [];
        foreach ($this->items as $item) {
            $json[] = $item->serialize();
        }

        return $json;
    }
}

<?php

namespace App\Domain\Order;

/**
 * Class Order
 *
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
    private $price;

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
     *
     * @param array  $items
     * @param string $description
     * @param string $typePayment
     */
    public function __construct(array $items, string $description, string $typePayment)
    {
        $this->id = "id";
        $this->items = $items;
        $this->description = $description;
        $this->typePayment = $typePayment;
    }

    /**
     * @return int
     */
    public function price(): int
    {
        foreach ($this->items as $item) {
            $this->price += $item->total();
        }

        return $this->price;
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
            'price' => $this->price(),
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

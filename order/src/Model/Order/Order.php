<?php
declare(strict_types=1);

namespace App\Model\Order;

/**
 * Class Order
 *
 * @package App\Model\Order
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
    private $typePayment;

    /**
     * Order constructor.
     *
     * @param string $id
     * @param string $typePayment
     * @param float  $price
     */
    public function __construct(string $id, string $typePayment, float $price)
    {
        $this->id = $id;
        $this->typePayment = $typePayment;
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function price(): float
    {
        foreach ($this->items as $item) {
            $this->price += $item->total();
        }

        return $this->price;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
        //            'items' => $this->itemSerialize(),
            'type_payment' => $this->typePayment,
            'price' => $this->price,
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

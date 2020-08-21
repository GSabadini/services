<?php
declare(strict_types=1);

namespace App\Model\Order;

/**
 * Class Order
 * @package App\Model\Order
 */
final class Order
{
    /**
     * @var string
     */
    private $id;

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
}

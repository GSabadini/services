<?php
declare(strict_types=1);

namespace App\Service\Order;

/**
 * Class OrderDTO
 * @package App\Service\Order
 */
final class OrderDTO implements \JsonSerializable
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


    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'type_payment' => $this->typePayment,
            'price' => $this->price,
        ];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getTypePayment(): string
    {
        return $this->typePayment;
    }
}

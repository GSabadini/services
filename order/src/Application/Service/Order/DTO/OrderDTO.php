<?php
declare(strict_types=1);

namespace App\Application\Service\Order\DTO;

/**
 * Class OrderDTO
 *
 * @package App\Application\Service\Order\DTO
 */
final class OrderDTO implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $typePayment;

    /**
     * @var array
     */
    private array $items;

    /**
     * @var int
     */
    private int $price;

    /**
     * Order constructor.
     *
     * @param string $typePayment
     * @param array $items
     * @param int $price
     */
    public function __construct(string $typePayment, array $items, int $price)
    {
        $this->typePayment = $typePayment;
        $this->items = $items;
        $this->price = $price;
    }


    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'type_payment' => $this->getTypePayment(),
            'items' => $this->getItems(),
            'amount' => $this->getPrice(),
        ];
    }

    /**
     * @return string
     */
    public function getTypePayment(): string
    {
        return $this->typePayment;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}

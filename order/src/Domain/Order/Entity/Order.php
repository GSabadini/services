<?php
declare(strict_types=1);

namespace App\Domain\Order\Entity;

use App\Domain\ValueObject\Uuid;

/**
 * Class Order
 *
 * @package App\Domain\Order\Entity
 */
final class Order
{
    /**
     * @var Uuid
     */
    private Uuid $id;

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
     * @param Uuid   $id
     * @param string $typePayment
     * @param array  $items
     * @param int    $price
     */
    public function __construct(Uuid $id, string $typePayment, array $items, int $price)
    {
        $this->id = $id;
        $this->typePayment = $typePayment;
        $this->items = $items;
        $this->price = $price;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
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

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}

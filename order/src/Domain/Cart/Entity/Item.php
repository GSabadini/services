<?php
declare(strict_types=1);

namespace App\Domain\Cart\Entity;

/**
 * Class Item
 *
 * @package App\Domain\Cart\Entity
 */
final class Item
{
    /**
     * @var string
     */
    private string $description;

    /**
     * @var int
     */
    private int $quantity;

    /**
     * @var float
     */
    private float $unitPrice;

    /**
     * Item constructor.
     *
     * @param string $description
     * @param $quantity
     * @param float  $unitPrice
     */
    public function __construct(string $description, int $quantity, float $unitPrice)
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

<?php
declare(strict_types=1);

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
     * @var int
     */
    private $amount;

    /**
     * @var string
     */
    private $typePayment;

    /**
     * Order constructor.
     *
     * @param string $id
     * @param string $typePayment
     * @param int    $amount
     */
    public function __construct(string $id, string $typePayment, int $amount)
    {
        $this->id = $id;
        $this->typePayment = $typePayment;
        $this->amount = $amount;
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
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getTypePayment(): string
    {
        return $this->typePayment;
    }
}

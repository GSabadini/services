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
     * @var int
     */
    private int $amount;

    /**
     * Order constructor.
     *
     * @param Uuid $id
     * @param string $typePayment
     * @param int $amount
     */
    public function __construct(Uuid $id, string $typePayment, int $amount)
    {
        $this->id = $id;
        $this->typePayment = $typePayment;
        $this->amount = $amount;
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

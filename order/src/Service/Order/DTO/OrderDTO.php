<?php
declare(strict_types=1);

namespace App\Service\Order\DTO;

/**
 * Class OrderDTO
 *
 * @package App\Service\Order
 */
final class OrderDTO implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $typePayment;

    /**
     * @var int
     */
    private $amount;

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
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'type_payment' => $this->getTypePayment(),
            'amount' => $this->getAmount(),
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
     * @return string
     */
    public function getTypePayment(): string
    {
        return $this->typePayment;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }
}

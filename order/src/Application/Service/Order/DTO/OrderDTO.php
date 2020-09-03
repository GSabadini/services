<?php
declare(strict_types=1);

namespace App\Application\Service\Order\DTO;

/**
 * Class OrderDTO
 * @package App\Application\Service\Order\DTO
 */
final class OrderDTO implements \JsonSerializable
{
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
     * @param string $typePayment
     * @param int    $amount
     */
    public function __construct(string $typePayment, int $amount)
    {
        $this->typePayment = $typePayment;
        $this->amount = $amount;
    }


    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
//            'id' => $this->getId(),
            'type_payment' => $this->getTypePayment(),
            'amount' => $this->getAmount(),
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
    public function getAmount(): int
    {
        return $this->amount;
    }
}

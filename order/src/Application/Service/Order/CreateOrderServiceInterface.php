<?php
declare(strict_types=1);

namespace App\Application\Service\Order;

use App\Application\Service\Order\DTO\OrderDTO;

/**
 * Interface CreateOrderServiceInterface
 * @package App\Application\Service\Order
 */
interface CreateOrderServiceInterface
{
    /**
     * @param OrderDTO $dto
     */
    public function create(OrderDTO $dto): void;
}

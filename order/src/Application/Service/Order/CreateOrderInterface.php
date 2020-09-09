<?php
declare(strict_types=1);

namespace App\Application\Service\Order;

use App\Application\Service\Order\DTO\OrderDTO;

/**
 * Interface CreateOrderInterface
 *
 * @package App\Application\Service\Order
 */
interface CreateOrderInterface
{
    /**
     * @param OrderDTO $dto
     */
    public function create(OrderDTO $dto): void;
}

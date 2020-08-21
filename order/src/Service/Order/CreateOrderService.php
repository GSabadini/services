<?php
declare(strict_types=1);

namespace App\Service\Order;

use App\Domain\Order\Order;
use App\Service\Order\DTO\OrderDTO;

/**
 * Interface CreateOrderService
 *
 * @package App\Service\Order
 */
interface CreateOrderService
{
    /**
     * @param  OrderDTO $dto
     * @return Order
     */
    public function create(OrderDTO $dto): Order;
}

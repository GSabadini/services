<?php
declare(strict_types=1);

namespace App\Service\Order;

use App\Model\Order\Order;

/**
 * Interface OrderServiceInterface
 * @package App\Service\Order
 */
interface OrderServiceInterface
{
    /**
     * @param OrderDTO $orderDTO
     * @return Order
     */
    public function create(OrderDTO $orderDTO): Order;
}

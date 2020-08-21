<?php
declare(strict_types=1);

namespace App\Service\Order;

use App\Model\Order\Order;

/**
 * Interface ICreateOrderService
 * @package App\Service\Order
 */
interface ICreateOrderService
{
    /**
     * @param OrderDTO $dto
     * @return Order
     */
    public function create(OrderDTO $dto): Order;
}

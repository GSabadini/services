<?php
declare(strict_types=1);

namespace App\Model\Order;

/**
 * Interface IOrderDAO
 *
 * @package App\Model\Order
 */
interface IOrderDAO
{
    /**
     * @param  Order $order
     * @return Order
     */
    public function create(Order $order): Order;
}

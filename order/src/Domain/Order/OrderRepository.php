<?php

namespace App\Domain\Order;

/**
 * Interface OrderRepository
 *
 * @package App\Domain\Order
 */
interface OrderRepository
{
    /**
     * @param  Order $order
     * @return Order
     */
    public function create(Order $order): Order;
}

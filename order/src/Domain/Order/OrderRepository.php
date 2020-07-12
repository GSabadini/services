<?php

namespace App\Domain\Order;

/**
 * Interface OrderRepository
 * @package App\Domain\Order
 */
interface OrderRepository {
    /**
     * @return Order
     */
    public function create(): Order;
}

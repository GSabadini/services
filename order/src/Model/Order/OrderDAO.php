<?php
declare(strict_types=1);

namespace App\Model\Order;

/**
 * Interface OrderDAO
 * @package App\Model\Order
 */
interface OrderDAO
{
    /**
     * @param  Order $order
     * @return Order
     */
    public function create(Order $order): Order;

//    /**
//     * @param  string $id
//     * @return Order
//     */
//    public function findOfId(string $id): Order;
}

<?php

namespace App\Repository\Order;

use App\Domain\Item\Item;
use App\Domain\Order\Order;
use App\Domain\Order\OrderRepository as IOrderRepository;

/**
 * Class OrderRepository
 * @package App\Repository
 */
final class OrderRepository implements IOrderRepository
{
    /**
     * @return Order
     */
    public function create(): Order
    {
        return new Order((array)new Item("", "", 0, 0), "", "");
    }
}

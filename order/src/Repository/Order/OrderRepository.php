<?php

namespace App\Repository\Order;

use App\Domain\Item\Item;
use App\Domain\Order\Order;
use App\Domain\Order\OrderRepository as IOrderRepository;

/**
 * Class OrderRepository
 *
 * @package App\Repository
 */
final class OrderRepository implements IOrderRepository
{
    private $database;

    /**
     * OrderRepository constructor.
     *
     * @param $database
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    /**
     * @param  Order $order
     * @return Order
     */
    public function create(Order $order): Order
    {
        return new Order((array)new Item("", "", 0, 0), "", "");
    }
}

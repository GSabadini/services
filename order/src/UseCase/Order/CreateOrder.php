<?php

namespace App\UseCase\Order;

use App\Domain\Order\Order;
use App\Domain\Order\OrderRepository;

/**
 * Class CreateOrder
 *
 * @package App\UseCase\Order
 */
final class CreateOrder
{
    /**
     * @var OrderRepository
     */
    private $repository;

    /**
     * CreateOrder constructor.
     *
     * @param $repository
     */
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  Order $order
     * @return Order
     */
    public function createOrder(Order $order)
    {
        return $this->repository->create($order);
    }
}

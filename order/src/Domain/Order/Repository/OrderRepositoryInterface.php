<?php
declare(strict_types=1);

namespace App\Domain\Order\Repository;

use App\Domain\Order\Entity\Order;
use App\Domain\Order\Exception\CreateOrderException;

/**
 * Interface OrderRepositoryInterface
 * @package App\Domain\Order\Repository
 */
interface OrderRepositoryInterface
{
    /**
     * @param  Order $order
     * @throws CreateOrderException
     */
    public function create(Order $order): void;

    /**
     * @return mixed
     */
    public function findAll();
}

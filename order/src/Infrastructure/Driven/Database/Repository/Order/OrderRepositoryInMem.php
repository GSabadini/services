<?php
declare(strict_types=1);

namespace App\Infrastructure\Driven\Database\Repository\Order;

use App\Domain\Order\Entity\Order;
use App\Domain\Order\Exception\CreateOrderException;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use App\Infrastructure\Driven\Database\Database;

/**
 * Class OrderRepositoryInMem
 *
 * @package App\Infrastructure\Driven\Database\Repository\Order
 */
final class OrderRepositoryInMem implements OrderRepositoryInterface
{


    public function create(Order $order): void
    {
        // TODO: Implement create() method.
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }
}

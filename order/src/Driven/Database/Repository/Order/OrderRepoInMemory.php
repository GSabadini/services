<?php
declare(strict_types=1);

namespace App\Driven\Database\Repository\Order;

use App\Domain\Order\Order;
use App\Domain\Order\OrderRepository;

/**
 * Class OrderRepoInMemory
 *
 * @package App\Driven\Database\Repository\Order
 */
final class OrderRepoInMemory implements OrderRepository
{
    /**
     * @var
     */
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
        return $order;
    }
}

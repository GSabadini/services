<?php
declare(strict_types=1);

namespace App\Driven\Database\Repository\Order;

use App\Domain\Order\OrderRepository;
use App\Driven\Database;

/**
 * Class OrderRepoMySQL
 *
 * @package App\Driven\Database\Repository\Order
 */
final class OrderRepoMySQL implements OrderRepository
{
    /**
     * @var Database\DatabaseAdapter
     */
    private $database;

    /**
     * OrderRepoMySQL constructor.
     *
     * @param Database\DatabaseAdapter $database
     */
    public function __construct(Database\DatabaseAdapter $database)
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

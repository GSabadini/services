<?php
declare(strict_types=1);

namespace App\Driven\Database\DAO\Order;

use App\Driven\Database;
use App\Model\Order\Order;
use App\Model\Order\IOrderDAO;

/**
 * Class OrderDAOInMemory
 *
 * @package App\Driven\Database\DAO\Order
 */
final class OrderDAOInMemory implements IOrderDAO
{
    /**
     * @var
     */
    private $database;

    /**
     * IOrderDAO constructor.
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

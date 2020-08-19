<?php
declare(strict_types=1);

namespace App\Service\Order;

use App\Model\Order\OrderDAO;
use App\Model\Order\Order;

/**
 * Class Order
 * @package App\Service\Order
 */
final class OrderService
{
    /**
     * @var OrderDAO
     */
    private $dao;

    /**
     * Order constructor.
     *
     * @param $dao
     */
    public function __construct(OrderDAO $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @return Order
     */
    public function create(): Order
    {
        return $this->dao->create(new Order("id", "credit-card", 75.45));
    }
}

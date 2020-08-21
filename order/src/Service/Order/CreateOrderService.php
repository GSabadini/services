<?php
declare(strict_types=1);

namespace App\Service\Order;

use App\Model\Order\IOrderDAO;
use App\Model\Order\Order;

/**
 * Class CreateOrderService
 * @package App\Service\Order
 */
final class CreateOrderService implements ICreateOrderService
{
    /**
     * @var IOrderDAO
     */
    private $dao;

    /**
     * Order constructor.
     *
     * @param $dao
     */
    public function __construct(IOrderDAO $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @param OrderDTO $dto
     * @return Order
     */
    public function create(OrderDTO $dto): Order
    {
        return $this->dao->create(
            new Order(
                $dto->getId(),
                $dto->getTypePayment(),
                $dto->getPrice()
            )
        );
    }
}

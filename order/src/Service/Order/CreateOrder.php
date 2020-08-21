<?php
declare(strict_types=1);

namespace App\Service\Order;

use App\Domain\Order\Order;
use App\Domain\Order\OrderRepository;
use App\Service\Order\DTO\OrderDTO;
use Psr\Log\LoggerInterface;

/**
 * Class CreateOrder
 *
 * @package App\Service\Order
 */
final class CreateOrder implements CreateOrderService
{
    /**
     * @var OrderRepository
     */
    private $repository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * CreateOrder constructor.
     *
     * @param OrderRepository $repository
     * @param LoggerInterface $logger
     */
    public function __construct(OrderRepository $repository, LoggerInterface $logger)
    {
        $this->repository = $repository;
        $this->logger = $logger;
    }

    /**
     * @param  OrderDTO $dto
     * @return Order
     */
    public function create(OrderDTO $dto): Order
    {
        $this->logger->info("Create order service");
        return $this->repository->create(
            new Order(
                $dto->getId(),
                $dto->getTypePayment(),
                $dto->getAmount()
            )
        );
    }
}

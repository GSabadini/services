<?php
declare(strict_types=1);

namespace App\Application\Service\Order;

use App\Application\Service\Order\DTO\OrderDTO;
use App\Domain\Order\Entity\Order;
use App\Domain\Order\Exception\CreateOrderException;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use App\Domain\ValueObject\Uuid;
use Psr\Log\LoggerInterface;

/**
 * Class CreateOrder
 *
 * @package App\Application\Service\Order
 */
final class CreateOrder implements CreateOrderInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var OrderRepositoryInterface
     */
    private OrderRepositoryInterface $repository;

    /**
     * CreateOrder constructor.
     *
     * @param LoggerInterface          $logger
     * @param OrderRepositoryInterface $repository
     */
    public function __construct(LoggerInterface $logger, OrderRepositoryInterface $repository)
    {
        $this->logger = $logger;
        $this->repository = $repository;
    }

    /**
     * @param  OrderDTO $dto
     * @throws CreateOrderException
     * @throws \Exception
     */
    public function create(OrderDTO $dto): void
    {
        $this->repository->create(
            new Order(
                Uuid::random(),
                $dto->getTypePayment(),
                $dto->getItems(),
                $dto->getPrice()
            )
        );

        $this->logger->info("Create order service successful");
    }
}

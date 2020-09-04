<?php
declare(strict_types=1);

namespace App\Application\Service\Order;

use App\Domain\Order\Repository\OrderRepositoryInterface;
use Psr\Log\LoggerInterface;

/**
 * Class FindAllOrder
 * @package App\Application\Service\Order
 */
final class FindAllOrder implements FindAllOrderInterface
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
     * FindAllOrder constructor.
     * @param LoggerInterface $logger
     * @param OrderRepositoryInterface $repository
     */
    public function __construct(LoggerInterface $logger, OrderRepositoryInterface $repository)
    {
        $this->logger = $logger;
        $this->repository = $repository;
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }
}

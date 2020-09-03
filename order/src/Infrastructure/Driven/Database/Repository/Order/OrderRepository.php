<?php
declare(strict_types=1);

namespace App\Infrastructure\Driven\Database\Repository\Order;

use App\Domain\Order\Entity\Order;
use App\Domain\Order\Exception\CreateOrderException;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use App\Infrastructure\Driven\Database\Database;
use Psr\Log\LoggerInterface;

/**
 * Class OrderRepository
 *
 * @package App\Infrastructure\Driven\Database\Repository\Order
 */
final class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var Database
     */
    private Database $database;

    /**
     * OrderRepository constructor.
     *
     * @param LoggerInterface $logger
     * @param Database        $database
     */
    public function __construct(LoggerInterface $logger, Database $database)
    {
        $this->logger = $logger;
        $this->database = $database;
    }

    /**
     * @param  Order $order
     * @throws CreateOrderException
     */
    public function create(Order $order): void
    {
        try {
            $query = sprintf(
                "INSERT INTO orders VALUE ('%s', '%s', '%f');",
                $order->getId(),
                $order->getTypePayment(),
                $order->getAmount()
            );

            $this->database->exec($query);

            $this->logger->info("Create order repository successful");
        } catch (\Exception $e) {
            $this->logger->error("Create order repository failed: " . $e->getMessage());

            throw new CreateOrderException("impossible_create_order", $e->getCode(), $e);
        }
    }
}

<?php
declare(strict_types=1);

namespace App\Infrastructure\Driven\Database\Repository\Order;

use App\Domain\Order\Entity\Order;
use App\Domain\Order\Exception\CreateOrderException;
use App\Domain\Order\Exception\FindAllOrderException;
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
            $this->database
                ->prepare('INSERT INTO orders (id, items, type_payment, price) VALUES (:id, :items, :type_payment, :price)')
                ->execute(
                    [
                        'id'=> $order->getId(),
                        'items' => json_encode($order->getItems()),
                        'type_payment' => $order->getTypePayment(),
                        'price' => $order->getPrice(),
                    ]
                );

            $this->logger->info("Create order repository successful");
        } catch (\Exception $e) {
            $this->logger->error("Create order repository failed: " . $e->getMessage());

            throw new CreateOrderException("impossible_create_order", $e->getCode(), $e);
        }
    }

    /**
     * @return array|mixed
     * @throws FindAllOrderException
     */
    public function findAll()
    {
        try {
            $this->logger->info("Find all order repository successful");

            $stmt = $this->database->prepare('SELECT * FROM orders');
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $this->logger->error("Find all order repository failed: " . $e->getMessage());

            throw new FindAllOrderException("impossible_find_all_order", $e->getCode(), $e);
        }
    }
}

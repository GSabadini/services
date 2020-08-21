<?php
declare(strict_types=1);

namespace App\Driven\Database;

use Psr\Log\LoggerInterface;

/**
 * Class DatabaseAdapter
 *
 * @package App\Driven\Database
 */
final class DatabaseAdapter implements Database
{
    private $connection;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * DatabaseAdapter constructor.
     *
     * @param $connection
     * @param $logger
     */
    public function __construct($connection, LoggerInterface $logger)
    {
        $this->connection = $connection;
        $this->logger = $logger;
    }

    public function beginTransaction(): void
    {
        // TODO: Implement beginTransaction() method.
    }

    public function commit(): void
    {
        // TODO: Implement commit() method.
    }

    public function rollback(): void
    {
        // TODO: Implement rollback() method.
    }

    public function close(): void
    {
        // TODO: Implement close() method.
    }

    public function prepare(): void
    {
        // TODO: Implement prepare() method.
    }
}

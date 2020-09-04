<?php
declare(strict_types=1);

namespace App\Infrastructure\Driven\Database;

use Psr\Log\LoggerInterface;

/**
 * Class DatabaseAdapter
 *
 * @package App\Infrastructure\Driven\Database
 */
final class DatabaseAdapter implements Database
{
    /**
     * @var \PDO
     */
    private \PDO $connection;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

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

    public function exec($statement): void
    {
        $this->connection->exec($statement);
    }

    public function query($statement): void
    {
        $this->connection->query($statement);
    }

    /**
     * @param  $statement
     * @return \PDOStatement
     */
    public function prepare($statement): \PDOStatement
    {
        return $this->connection->prepare($statement);
    }
}

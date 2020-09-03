<?php
declare(strict_types=1);

use App\Application\Service\Order\CreateOrderService;
use App\Application\Service\Order\CreateOrderServiceInterface;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use App\Infrastructure\Driven\Database\Connection;
use App\Infrastructure\Driven\Database\DatabaseAdapter;
use App\Infrastructure\Driven\Database\Repository\Order\OrderRepository;
use DI\ContainerBuilder;
use Monolog\Formatter\JsonFormatter;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryPeakUsageProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\WebProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions(
        [
            LoggerInterface::class => function (ContainerInterface $c) {
                $settings = $c->get('settings');

                $loggerSettings = $settings['logger'];
                $logger = new Logger($loggerSettings['name']);

                $UidProcessor = new UidProcessor();
                $logger->pushProcessor($UidProcessor);

                $webProcessor = new WebProcessor();
                $logger->pushProcessor($webProcessor);

                $memUsageProcessor = new MemoryUsageProcessor();
                $logger->pushProcessor($memUsageProcessor);

                $memPeakUsageProcessor = new MemoryPeakUsageProcessor();
                $logger->pushProcessor($memPeakUsageProcessor);

                $webProcessor = new WebProcessor();
                $logger->pushProcessor($webProcessor);

                $hostNameProcessor = new HostnameProcessor();
                $logger->pushProcessor($hostNameProcessor);

                $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
                $logger->pushHandler($handler);

                $formatter = new JsonFormatter();
                $handler->setFormatter($formatter);

                return $logger;
            },
            Connection::class => function (ContainerInterface $c) {
                $logger = $c->get(LoggerInterface::class);

                try {
                    $settings = $c->get('settings');

                    $conn = new PDO(
                        $settings['mysql']['dns'],
                        $settings['mysql']['username'],
                        $settings['mysql']['password'],
                        [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        ]
                    );

                    $logger->info("Connected database successfully");
                    return new DatabaseAdapter($conn, $logger);
                } catch(PDOException $e) {
                    $logger->info("Connection database failed: " . $e->getMessage());
                }
            },
            OrderRepositoryInterface::class => function (ContainerInterface $c) {
                return new OrderRepository($c->get(LoggerInterface::class), $c->get(Connection::class));
            },
            CreateOrderServiceInterface::class => function (ContainerInterface $c) {
                return new CreateOrderService($c->get(LoggerInterface::class), $c->get(OrderRepositoryInterface::class));
            },
        ]
    );
};

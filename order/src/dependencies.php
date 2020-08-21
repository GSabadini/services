<?php
declare(strict_types=1);

use App\Domain\Order\OrderRepository;
use App\Driven\Database\DatabaseAdapter;
use App\Service\Order\CreateOrder;
use App\Service\Order\CreateOrderService;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use App\Driven\Database\Repository\Order\OrderRepoInMemory;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions(
        [
            LoggerInterface::class => function (ContainerInterface $c) {
                $settings = $c->get('settings');

                $loggerSettings = $settings['logger'];
                $logger = new Logger($loggerSettings['name']);

                $processor = new UidProcessor();
                $logger->pushProcessor($processor);

                $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
                $logger->pushHandler($handler);

                return $logger;
            },
        //            Connection::class => function (ContainerInterface $c) {
        //                $logger = $c->get(LoggerInterface::class);
        //
        //                try {
        //                    $settings = $c->get('settings');
        //
        //                    $dns = sprintf("mysql:host=%s;dbname=%s", $settings['mysql']['host'], $settings['mysql']['database']);
        //                    $conn = new PDO(
        //                        $dns,
        //                        $settings['mysql']['username'],
        //                        $settings['mysql']['pass']
        //                    );
        //                    // set the PDO error mode to exception
        //                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //                    echo "Connected successfully";
        //                    return new DatabaseAdapter($conn, $logger);
        //                } catch(PDOException $e) {
        //                    $logger->info("Connection failed: " . $e->getMessage());
        //                }
        //            },
            OrderRepository::class => function (ContainerInterface $c) {
                return new OrderRepoInMemory('');
            },
        //            OrderRepository::class => function (ContainerInterface $c) {
        //                return new OrderRepoMySQL($c->get(Connection::class));
        //            },
            CreateOrderService::class => function (ContainerInterface $c) {
                return new CreateOrder($c->get(OrderRepository::class), $c->get(LoggerInterface::class));
            },
        ]
    );
};

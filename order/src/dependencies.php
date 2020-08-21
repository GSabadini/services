<?php
declare(strict_types=1);

use App\Service\Order\CreateOrderService;
use App\Service\Order\ICreateOrderService;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use App\Driven\Database\DAO\Order\OrderDAOInMemory;
use App\Model\Order\IOrderDAO;
use App\Service\Order\OrderService;

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
            //        Connection::class => function (ContainerInterface $c) {
            //            try {
            //                $settings = $c->get('settings');
            //
            //                $dns = sprintf("mysql:host=%s;dbname=%s", $settings['mysql']['host'], $settings['mysql']['database']);
            //                $conn = new PDO(
            //                    $dns,
            //                    $settings['mysql']['username'],
            //                    $settings['mysql']['pass']
            //                );
            //                // set the PDO error mode to exception
            //                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //                echo "Connected successfully";
            //                return $conn;
            //            } catch(PDOException $e) {
            //                echo "Connection failed: " . $e->getMessage();
            //            }
            //        },
            IOrderDAO::class => function (ContainerInterface $c) {
                return new OrderDAOInMemory('');
            },
            OrderService::class => function (ContainerInterface $c) {
                return new OrderService($c->get(IOrderDAO::class));
            },
            ICreateOrderService::class => function (ContainerInterface $c) {
                return new CreateOrderService($c->get(IOrderDAO::class));
            },
        ]
    );
};

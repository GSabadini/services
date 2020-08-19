<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use App\Driven\Database\DAO\Order\OrderDAOInMemory;
use App\Model\Order\OrderDAO;
use App\Service\Order\OrderService;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
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
        OrderDAO::class => \DI\autowire(OrderDAOInMemory::class),
        'OrderDAOInMemory' => function (Container $c) {
            return new OrderDAOInMemory('');
        },
        OrderService::class => function (ContainerInterface $c) {
            return new OrderService(new OrderDAOInMemory(''));
        },
    ]);
};

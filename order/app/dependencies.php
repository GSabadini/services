<?php

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        \App\Application\Handler\Order\CreateOrderHandler::class  => function (ContainerInterface $c) {
            return \App\Application\Handler\Order\CreateOrderHandler::class;
        }
//        LoggerInterface::class => function (ContainerInterface $c) {
//            $settings = $c->get('settings');
//
//            $loggerSettings = $settings['logger'];
//            $logger = new Logger($loggerSettings['name']);
//
//            $processor = new UidProcessor();
//            $logger->pushProcessor($processor);
//
//            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
//            $logger->pushHandler($handler);

//            return $logger;
//        },
    ]);
};

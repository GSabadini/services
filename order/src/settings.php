<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions(
        [
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name' => 'app-order',
        //                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'path' => 'php://stdout',
                'level' => Logger::DEBUG,
            ],
            'mysql' => [
                'host' => 'mysql-order',
                'database' => 'orders',
                'user' => 'dev',
                'password' => 'dev',
            ]
        ],
        ]
    );
};

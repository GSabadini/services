<?php

require __DIR__ . '/../vendor/autoload.php';

$app = \DI\Bridge\Slim\Bridge::create();

// Register routes
$routes = include __DIR__ . '/../app/routes.php';
$routes($app);

$app->run();

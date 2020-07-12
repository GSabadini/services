<?php

use DI\ContainerBuilder;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;
use Slim\ResponseEmitter;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate PHP-DI ContainerBuilder
//$containerBuilder = new ContainerBuilder();

// Set up dependencies
//$dependencies = require __DIR__ . '/../app/dependencies.order';
//$dependencies($containerBuilder);

$app = \DI\Bridge\Slim\Bridge::create();
//$app = AppFactory::create();

// Register routes
$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$app->run();

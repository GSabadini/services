<?php
declare(strict_types=1);

use App\Driver\WebApi\ResponseEmitter\ResponseEmitter;
use Slim\Factory\AppFactory;
use DI\ContainerBuilder;
use Slim\Factory\ServerRequestCreatorFactory;

use Psr\Container\ContainerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

// Set up settings
$settings = require __DIR__ . '/settings.php';
$settings($containerBuilder);

// Set up dependencies
$dependencies = require __DIR__ . '/dependencies.php';
$dependencies($containerBuilder);

AppFactory::setContainer($containerBuilder->build());
$app = AppFactory::create();

// Register routes
$routes = require __DIR__ . '/routes.php';
$routes($app);

// Create Request object from globals
$serverRequestCreator = ServerRequestCreatorFactory::create();
$request = $serverRequestCreator->createServerRequestFromGlobals();

// Run App & Emit Response
$response = $app->handle($request);
$responseEmitter = new ResponseEmitter();
$responseEmitter->emit($response);

//$app->run();

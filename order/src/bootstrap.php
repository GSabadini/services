<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';


use App\App;

(new App())->run();

//$containerBuilder = new ContainerBuilder();
//
//// Set up settings
//$settings = require __DIR__ . '/settings.php';
//$settings($containerBuilder);
//
//// Set up dependencies
//$dependencies = require __DIR__ . '/dependencies.php';
//$dependencies($containerBuilder);
//
//// Build PHP-DI Container instance
//$container = $containerBuilder->build();

//AppFactory::setContainer($container);
//$app = AppFactory::create();
//$callableResolver = $app->getCallableResolver();
//
//// Register routes
////$routes = require __DIR__ . '/routes.php';
////$routes($app);
//
///** @var bool $displayErrorDetails */
//$displayErrorDetails = $container->get('settings')['displayErrorDetails'];

// Create Request object from globals
//$serverRequestCreator = ServerRequestCreatorFactory::create();
//$request = $serverRequestCreator->createServerRequestFromGlobals();

// Create Error Handler
//$responseFactory = $app->getResponseFactory();
//$errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);

// Create Shutdown Handler
//$shutdownHandler = new ShutdownHandler($request, $errorHandler, $displayErrorDetails);
//register_shutdown_function($shutdownHandler);
//
//// Add Error Middleware
//$errorMiddleware = $app->addErrorMiddleware($displayErrorDetails, false, false);
//$errorMiddleware->setDefaultErrorHandler($errorHandler);

// Run App & Emit Response
//$response = $app->handle($request);
//$responseEmitter = new ResponseEmitter();
//$responseEmitter->emit($response);

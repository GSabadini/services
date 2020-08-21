<?php
declare(strict_types=1);

namespace App;

use App\Driver\WebApi\Handler\HttpErrorHandler;
use App\Driver\WebApi\Handler\ShutdownHandler;
use App\Driver\WebApi\ResponseEmitter\ResponseEmitter;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;
use DI\ContainerBuilder;

/**
 * Class App
 *
 * @package App
 */
final class App
{
    /**
     * @var \Slim\App
     */
    private $app;

    /**
     * @var
     */
    private $requestGlobal;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $serverRequestCreator = ServerRequestCreatorFactory::create();
        $this->requestGlobal = $serverRequestCreator->createServerRequestFromGlobals();

        AppFactory::setContainer($this->buildContainer());
        $this->app = AppFactory::create();

        $this->registerRoutes();
        $this->addErrorMiddleware();
    }

    public function run():void
    {
        // Run App & Emit Response
        $response = $this->app->handle($this->requestGlobal);
        $responseEmitter = new ResponseEmitter();
        $responseEmitter->emit($response);
    }

    /**
     * @return ContainerInterface
     */
    private function buildContainer()
    {
        $containerBuilder = new ContainerBuilder();

        // Set up settings
        $settings = include __DIR__ . '/settings.php';
        $settings($containerBuilder);

        // Set up dependencies
        $dependencies = include __DIR__ . '/dependencies.php';
        $dependencies($containerBuilder);

        // Build PHP-DI Container instance
        return $containerBuilder->build();
    }

    private function registerRoutes(): void
    {
        $routes = include __DIR__ . '/routes.php';
        $routes($this->app);
    }

    private function registerMiddlewares(): void
    {
    }

    private function addErrorMiddleware(): void
    {
        $callableResolver = $this->app->getCallableResolver();

        $container = $this->getContainer();

        /**
 * @var bool $displayErrorDetails 
*/
        $displayErrorDetails = $container->get('settings')['displayErrorDetails'];

        // Create Error Handler
        $responseFactory = $this->app->getResponseFactory();
        $errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);

        // Create Shutdown Handler
        $shutdownHandler = new ShutdownHandler($this->requestGlobal, $errorHandler, $displayErrorDetails);
        register_shutdown_function($shutdownHandler);

        // Add Error Middleware
        $errorMiddleware = $this->app->addErrorMiddleware($displayErrorDetails, false, false);
        $errorMiddleware->setDefaultErrorHandler($errorHandler);
    }

    /**
     * @return ContainerInterface|null
     */
    private function getContainer()
    {
        return $this->app->getContainer();
    }
}

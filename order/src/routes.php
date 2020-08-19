<?php
declare(strict_types=1);

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Driver\WebApi\Controller\Order\OrderController;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->group('/v1', function (Group $group) {
        $group->get('/health', function (Request $request, Response $response) {
            $response->getBody()->write('OK');
            return $response;
        });

        $group->post('/orders', OrderController::class . ':create');
    });
};

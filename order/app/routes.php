<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

use App\Application\Handler\Order\CreateOrderHandler;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/health', function (Request $request, Response $response) {
        $response->getBody()->write('OK');
        return $response;
    });

    $app->group('/orders', function (Group $group) {
        $group->post('', [CreateOrderHandler::class, 'create']);
    });
};

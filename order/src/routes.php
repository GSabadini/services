<?php
declare(strict_types=1);

use App\Infrastructure\Driver\WebApi\Action\Health\CheckHealthAction;
use App\Infrastructure\Driver\WebApi\Action\Order\CreateOrderAction;
use App\Infrastructure\Driver\WebApi\Action\Order\FindAllOrderAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options(
        '/{routes:.*}', function (Request $request, Response $response) {
            // CORS Pre-Flight OPTIONS Request Handler
            return $response;
        }
    );

    $app->group(
        '/v1', function (Group $group) {
            $group
                ->get('/health', CheckHealthAction::class)
                ->setName('check_health');

            $group
                ->post('/orders', CreateOrderAction::class)
                ->setName('create_order');

            $group
                ->get('/orders', FindAllOrderAction::class)
                ->setName('find_all_order');
        }
    );
};

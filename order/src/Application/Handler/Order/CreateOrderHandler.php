<?php

namespace App\Application\Handler\Order;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class CreateOrderHandler
{
    public function create(Request $request, Response $response)
    {
        $response->getBody()->write('CREATE');
        return $response;
    }
}

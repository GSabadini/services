<?php

namespace App\Application\Handler\Order;

use App\UseCase\Order\CreateOrder;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Class CreateOrderHandler
 *
 * @package App\Application\Handler\Order
 */
final class CreateOrderHandler
{
    /**
     * @var CreateOrder
     */
    private $usecase;

    /**
     * CreateOrderHandler constructor.
     *
     * @param CreateOrder $usecase
     */
    public function __construct(CreateOrder $usecase)
    {
        $this->usecase = $usecase;
    }

    /**
     * @param  Request  $request
     * @param  Response $response
     * @return Response
     */
    public function create(Request $request, Response $response)
    {
        $body = $request->getBody();
        $order = $this->usecase->createOrder($body);

        $response->getBody()->write('CREATE');
        return $response;
    }
}

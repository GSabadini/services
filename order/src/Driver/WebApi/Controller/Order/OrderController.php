<?php
declare(strict_types=1);

namespace App\Driver\WebApi\Controller\Order;

use App\Model\Order\Order;
use App\Service\Order\OrderService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;

/**
 * Class OrderController
 * @package App\Driver\WebApi\Controller
 */
final class OrderController
{
    /**
     * @var OrderService
     */
    private $service;

    /**
     * @var LoggerInterface
     */
    public $logger;

    public function __construct(LoggerInterface $logger, OrderService $service)
    {
        $this->logger = $logger;
        $this->service = $service;
    }

    /**
     * @param  Request  $request
     * @param  Response $response
     * @return Response
     */
    public function create(Request $request, Response $response)
    {
//        $body = $request->getBody();

        $this->logger->info('Bar');

        $order = $this->service->create();

        $response->getBody()->write(json_encode($order->serialize(), JSON_PRETTY_PRINT));
        return $response->withHeader('Content-Type', 'application/json');
    }
}

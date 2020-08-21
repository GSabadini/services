<?php
declare(strict_types=1);

namespace App\Driver\WebApi\Action\Order;

use App\Driver\WebApi\Action\Action;
use App\Service\Order\OrderService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Exception\HttpBadRequestException;

/**
 * Class CreateOrderAction
 *
 * @package App\Driver\WebApi\Action
 */
final class CreateOrderAction extends Action
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
     * @return Response
     */
    protected function action(): Response
    {
        $order = $this->service->create();

        $this->logger->info("Create order.");

        return $this->respondWithData($order->jsonSerialize(), 201);
    }
}

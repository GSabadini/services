<?php
declare(strict_types=1);

namespace App\Driver\WebApi\Action\Order;

use App\Domain\Order\Order;
use App\Driver\WebApi\Action\Action;
use App\Service\Order\CreateOrderService;
use App\Service\Order\DTO\OrderDTO;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

/**
 * Class CreateOrderAction
 *
 * @package App\Driver\WebApi\Action
 */
final class CreateOrderAction extends Action
{
    /**
     * @var CreateOrderService
     */
    private $service;

    /**
     * @var LoggerInterface
     */
    public $logger;

    /**
     * CreateOrderAction constructor.
     *
     * @param LoggerInterface    $logger
     * @param CreateOrderService $service
     */
    public function __construct(LoggerInterface $logger, CreateOrderService $service)
    {
        parent::__construct($logger);
        $this->logger = $logger;
        $this->service = $service;
    }

    /**
     * @return Response
     */
    protected function action(): Response
    {
        $parsedBody = $this->request->getParsedBody();
        $id = "ASDHSAHUSAHU";

        $order = $this->service->create(
            new OrderDTO(
                $id,
                $parsedBody['type_payment'],
                $parsedBody['amount']
            )
        );

        $response = new OrderDTO(
            $order->getId(),
            $order->getTypePayment(),
            $order->getAmount()
        );

        $this->logger->info("Create order action");

        return $this->respondWithData($response, 201);
    }
}

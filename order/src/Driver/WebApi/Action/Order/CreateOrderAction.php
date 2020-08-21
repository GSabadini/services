<?php
declare(strict_types=1);

namespace App\Driver\WebApi\Action\Order;

use App\Driver\WebApi\Action\Action;
use App\Service\Order\ICreateOrderService;
use App\Service\Order\OrderDTO;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Exception\HttpBadRequestException;

/**
 * Class CreateOrderAction
 * @package App\Driver\WebApi\Action
 */
final class CreateOrderAction extends Action
{
    /**
     * @var ICreateOrderService
     */
    private $service;

    /**
     * @var LoggerInterface
     */
    public $logger;

    /**
     * CreateOrderAction constructor.
     * @param LoggerInterface $logger
     * @param ICreateOrderService $service
     */
    public function __construct(LoggerInterface $logger, ICreateOrderService $service)
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

        $response = $this->service->create(
            new OrderDTO(
                $parsedBody->id,
                $parsedBody->type_payment,
                $parsedBody->price
            )
        );

        $this->logger->info("Create order.", ["key:" => "create_order"]);

        return $this->respondWithData($response, 201);
    }
}

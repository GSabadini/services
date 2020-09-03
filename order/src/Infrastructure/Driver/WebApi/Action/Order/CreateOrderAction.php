<?php
declare(strict_types=1);

namespace App\Infrastructure\Driver\WebApi\Action\Order;

use App\Application\Service\Order\CreateOrderServiceInterface;
use App\Application\Service\Order\DTO\OrderDTO;
use App\Infrastructure\Driver\WebApi\Action\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

/**
 * Class CreateOrderAction
 *
 * @package App\Infrastructure\Driver\WebApi\Action\Order
 */
final class CreateOrderAction extends Action
{
    /**
     * @var CreateOrderServiceInterface
     */
    private $service;

    /**
     * @var LoggerInterface
     */
    public LoggerInterface $logger;

    /**
     * CreateOrderAction constructor.
     *
     * @param LoggerInterface             $logger
     * @param CreateOrderServiceInterface $service
     */
    public function __construct(LoggerInterface $logger, CreateOrderServiceInterface $service)
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
        try {
            $parsedBody = $this->request->getParsedBody();
            $dto = new OrderDTO(
                $parsedBody['type_payment'],
                $parsedBody['amount']
            );

            $this->service->create($dto);

//            $response = new OrderDTO(
//                $dto->getTypePayment(),
//                $dto->getAmount()
//            );

            $this->logger->info("Create order action successful");
            return $this->respondWithData(null, 201);
        } catch (\Exception $e) {
            $this->logger->error("Create order action failed: " . $e->getMessage());

            return $this->respondWithData(['error' => $e->getMessage()], 400);
        }
    }
}

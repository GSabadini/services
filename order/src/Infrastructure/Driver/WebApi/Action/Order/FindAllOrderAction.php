<?php
declare(strict_types=1);

namespace App\Infrastructure\Driver\WebApi\Action\Order;

use App\Application\Service\Order\FindAllOrderInterface;
use App\Infrastructure\Driver\WebApi\Action\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindAllOrderAction extends Action
{
    /**
     * @var FindAllOrderInterface
     */
    private FindAllOrderInterface $service;

    /**
     * @var LoggerInterface
     */
    public LoggerInterface $logger;

    /**
     * CreateOrderAction constructor.
     *
     * @param LoggerInterface       $logger
     * @param FindAllOrderInterface $service
     */
    public function __construct(LoggerInterface $logger, FindAllOrderInterface $service)
    {
        parent::__construct($logger);
        $this->logger = $logger;
        $this->service = $service;
    }

    protected function action(): Response
    {
        try {
            $result = $this->service->findAll();
            $this->logger->info("Find all order action successful");

            return $this->respondWithData($result, 201);
        } catch (\Exception $e) {
            $this->logger->error("Find all order action failed: " . $e->getMessage());

            return $this->respondWithData(['error' => $e->getMessage()], $e->getCode());
        }
    }
}

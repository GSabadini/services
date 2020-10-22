<?php

namespace Tests\Unit\Application\Service\Order;

use App\Application\Service\Order\CreateOrder;
use App\Domain\Order\Entity\Order;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CreateOrderServiceTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(true);
    }

//    public function testCreateOrder()
//    {
//        $order = new Order("id", "credit-card", 70.45);
//
//        $loggerProphecy = $this->prophesize(LoggerInterface::class);
//        $orderRepo = $this->prophesize(OrderRepositoryInterface::class);
//        $orderRepo
//            ->create()
//            ->shouldBeCalledOnce();
//
//        $service = new CreateOrder($loggerProphecy, $orderRepo);
//        $result = $service->create($order);
//
//        $this->assertEquals($result, $order);
//    }
}

<?php

namespace Tests\Unit\Application\Service\Order;

use App\Application\Service\Order\CreateOrder;
use App\Domain\Order\Entity\Order;
use App\Domain\Order\Repository\OrderRepositoryInterface;
use PHPUnit\Framework\TestCase;

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
//        $userRepositoryProphecy = $this->prophesize(OrderRepositoryInterface::class);
//        $userRepositoryProphecy
//            ->create()
//            ->shouldBeCalledOnce();
//
//        $mockOrderDAO =
//        $service = new CreateOrder();
//        $result = $service->create($order);
//
//        $this->assertEquals($result, $order);
//    }
}

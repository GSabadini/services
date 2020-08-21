<?php

namespace Tests\Service\Order;

use App\Model\Order\Order;
use App\Service\Order\OrderService;
use PHPUnit\Framework\TestCase;

class CreateOrderTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(true);
    }

//    public function testCreateOrder()
//    {
//        $order = new Order("id", "credit-card", 70.45);
//
//        $mockOrderDAO =
//        $service = new OrderService();
//        $result = $service->create($order);
//
//        $this->assertEquals($result, $order);
//    }
}

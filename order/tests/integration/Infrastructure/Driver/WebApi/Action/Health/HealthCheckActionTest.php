<?php
declare(strict_types=1);

namespace Tests\Integration\Infrastructure\Driver\WebApi\Action\Health;

use App\Infrastructure\Driver\WebApi\Action\ActionPayload;
use Tests\Integration\TestCase;

/**
 * Class HealthCheckActionTest
 * @package Tests\Integration\Infrastructure\Driver\WebApi\Action\Health
 */
class HealthCheckActionTest extends TestCase
{
    public function testHealthCheckAction()
    {
        $app = $this->getAppInstanceSingleton();

        $request = $this->createRequest('GET', '/v1/health');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedPayload = new ActionPayload(200, ["status" => 'OK']);
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }
}

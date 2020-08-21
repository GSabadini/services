<?php
declare(strict_types=1);

namespace App\Driver\WebApi\Action\Health;

use App\Driver\WebApi\Action\Action;

/**
 * Class CheckHealthAction
 * @package App\Driver\WebApi\Action\Health
 */
final class CheckHealthAction extends Action
{
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function action(): \Psr\Http\Message\ResponseInterface
    {
        return $this->respondWithData(["status" => 'OK'], 200);
    }
}

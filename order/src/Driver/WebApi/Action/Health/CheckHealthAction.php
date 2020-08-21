<?php
declare(strict_types=1);

namespace App\Driver\WebApi\Action\Health;

use App\Driver\WebApi\Action\Action;
use Psr\Http\Message\ResponseInterface;

/**
 * Class CheckHealthAction
 *
 * @package App\Driver\WebApi\Action\Health
 */
final class CheckHealthAction extends Action
{
    /**
     * @return ResponseInterface
     */
    protected function action(): ResponseInterface
    {
        return $this->respondWithData(["status" => 'OK'], 200);
    }
}

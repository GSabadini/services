<?php
declare(strict_types=1);

namespace App\Domain\Order\Exception;

use Exception;

/**
 * Class CreateOrderException
 *
 * @package App\Domain\Order\Exception
 */
class CreateOrderException extends \Exception
{
    public function __construct($message = 'create_order_error', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

<?php
declare(strict_types=1);

namespace App\Domain\Order\Exception;

use Exception;

/**
 * Class FindAllOrderException
 *
 * @package App\Domain\Order\Exception
 */
final class FindAllOrderException extends \Exception
{
    public function __construct($message = 'find_all_order_error', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

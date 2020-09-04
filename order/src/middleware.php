<?php
declare(strict_types=1);

use App\App;
use App\Infrastructure\Driver\WebApi\Middleware\JsonBodyParserMiddleware;

return function (App $app) {
    $app->add(JsonBodyParserMiddleware::class);
};

<?php
declare(strict_types=1);

namespace App\Driven\Database;

/**
 * Interface Database
 *
 * @package App\Driven\Database
 */
interface Database
{
    public function prepare():void;
    public function beginTransaction(): void;
    public function commit(): void;
    public function rollback(): void;
    public function close(): void;
}

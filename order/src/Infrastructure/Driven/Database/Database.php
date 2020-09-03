<?php
declare(strict_types=1);

namespace App\Infrastructure\Driven\Database;

/**
 * Interface Database
 *
 * @package App\Infrastructure\Driven\Database
 */
interface Database
{
    public function prepare():void;
    public function beginTransaction(): void;
    public function commit(): void;
    public function rollback(): void;
    public function close(): void;
    public function exec($statement): void;
    public function query($statement): void;
}

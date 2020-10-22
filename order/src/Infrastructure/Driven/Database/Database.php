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
    public function prepare($statement): \PDOStatement;
    public function exec($statement): void;
    public function query($statement): void;
}

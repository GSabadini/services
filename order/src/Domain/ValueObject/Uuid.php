<?php
declare(strict_types=1);

namespace App\Domain\ValueObject;

use Ramsey\Uuid\Uuid as RamseyUuid;

/**
 * Class Uuid
 *
 * @package App\Domain\ValueObject
 */
final class Uuid
{
    private string $value;

    /**
     * Uuid constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (!\preg_match('/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/', $value)) {
            throw new \InvalidArgumentException('Invalid UUID format');
        }

        $this->value = $value;
    }

    /**
     * @return static
     * @throws \Exception
     */
    public static function random(): self
    {
        return new self(RamseyUuid::getFactory()->uuid4()->toString());
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @param  Uuid $id
     * @return bool
     */
    public function isEqual(self $id): bool
    {
        return $this->value === $id->value;
    }
}

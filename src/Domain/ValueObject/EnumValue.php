<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\ValueObject;

use CoreExtensions\SharedKernel\Domain\ValueObject;
use CoreExtensions\SharedKernel\Domain\ValueObjectTrait;
use CoreExtensions\SharedKernel\Feature\StringSerializable;
use MyCLabs\Enum\Enum;

abstract class EnumValue extends Enum implements ValueObject, StringSerializable
{
    use ValueObjectTrait;

    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @throws \BadMethodCallException
     *
     * @return static
     */
    public static function fromName(string $name): self
    {
        return static::__callStatic($name, []);
    }

    /**
     * @throws \UnexpectedValueException
     *
     * @return static
     */
    public static function fromString(string $value): StringSerializable
    {
        return self::fromValue($value);
    }

    /**
     * @param mixed $value
     *
     * @throws \UnexpectedValueException
     *
     * @return static
     */
    public static function fromValue($value): self
    {
        return new static($value);
    }

    public function toString(): string
    {
        return (string)$this->getValue();
    }

    public function toScalar(): string
    {
        return $this->toString();
    }
}

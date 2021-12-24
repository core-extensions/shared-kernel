<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\ValueObject;

use CoreExtensions\SharedKernel\Domain\ValueObject;
use CoreExtensions\SharedKernel\Domain\ValueObjectTrait;
use MyCLabs\Enum\Enum;

abstract class EnumValue extends Enum implements ValueObject
{
    use ValueObjectTrait;

    public static function fromName(string $name): self
    {
        return static::__callStatic($name, []);
    }

    public function toScalar()
    {
        return $this->getValue();
    }

    public static function fromRawValue($value): self
    {
        return new static($value);
    }

    public function toRawValue()
    {
        return $this->getValue();
    }
}

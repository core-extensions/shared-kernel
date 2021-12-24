<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\ValueObject;

use CoreExtensions\SharedKernel\Domain\ValueObject;
use CoreExtensions\SharedKernel\Domain\ValueObjectTrait;
use CoreExtensions\SharedKernel\Feature\StringSerializable;

class StringValue implements ValueObject, StringSerializable
{
    use ValueObjectTrait;

    private string $value;

    protected function __construct(string $value)
    {
        $this->setValue($value);
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @return static
     */
    public static function fromString(string $value): StringSerializable
    {
        return new static($value);
    }

    public function toString(): string
    {
        return $this->value();
    }

    public function toScalar(): string
    {
        return $this->value();
    }

    public function length(): int
    {
        return \mb_strlen($this->value());
    }

    protected function value(): string
    {
        return $this->value;
    }

    protected function setValue(string $value): void
    {
        $this->value = \trim($value);
    }
}

<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\ValueObject;

use CoreExtensions\Assert\Assert;
use CoreExtensions\SharedKernel\Domain\ValueObject;
use CoreExtensions\SharedKernel\Domain\ValueObjectTrait;
use CoreExtensions\SharedKernel\Feature\FloatSerializable;
use CoreExtensions\SharedKernel\Feature\StringSerializable;

class FloatValue implements ValueObject, FloatSerializable, StringSerializable
{
    use ValueObjectTrait;

    private float $value = 0.0;

    protected function __construct(float $value = 0.0)
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
    public static function empty(): self
    {
        return new static();
    }

    /**
     * @return static
     */
    public static function fromFloat(float $value): FloatSerializable
    {
        return new static($value);
    }

    /**
     * @return static
     */
    public static function fromString(string $value): StringSerializable
    {
        Assert::numeric($value);

        return self::fromFloat((float)$value);
    }

    public function toString(): string
    {
        return (string)$this->value;
    }

    public function toFloat(): float
    {
        return $this->value();
    }

    public function toScalar(): float
    {
        return $this->value();
    }

    public function add(self $valueObject): self
    {
        return self::fromFloat($this->toFloat() + $valueObject->toFloat());
    }

    public function subtract(self $valueObject): self
    {
        return self::fromFloat($this->toFloat() - $valueObject->toFloat());
    }

    protected function value(): float
    {
        return $this->value;
    }

    protected function setValue(float $value): void
    {
        $this->value = $value;
    }
}

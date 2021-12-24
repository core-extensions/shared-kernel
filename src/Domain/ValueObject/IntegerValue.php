<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\ValueObject;

use CoreExtensions\Assert\Assert;
use CoreExtensions\SharedKernel\Domain\ValueObject;
use CoreExtensions\SharedKernel\Domain\ValueObjectTrait;
use CoreExtensions\SharedKernel\Feature\IntegerSerializable;
use CoreExtensions\SharedKernel\Feature\StringSerializable;

class IntegerValue implements ValueObject, IntegerSerializable, StringSerializable
{
    use ValueObjectTrait;

    private int $value = 0;

    protected function __construct(int $value = 0)
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
    public static function fromInteger(int $value): IntegerSerializable
    {
        return new static($value);
    }

    /**
     * @return static
     */
    public static function fromString(string $value): StringSerializable
    {
        Assert::numeric($value);

        return self::fromInteger((int)$value);
    }

    public function toString(): string
    {
        return (string)$this->value;
    }

    public function toInteger(): int
    {
        return $this->value();
    }

    public function toScalar(): int
    {
        return $this->value();
    }

    public function add(self $valueObject): self
    {
        return self::fromInteger($this->toInteger() + $valueObject->toInteger());
    }

    public function subtract(self $valueObject): self
    {
        return self::fromInteger($this->toInteger() - $valueObject->toInteger());
    }

    protected function value(): int
    {
        return $this->value;
    }

    protected function setValue(int $value): void
    {
        $this->value = $value;
    }
}

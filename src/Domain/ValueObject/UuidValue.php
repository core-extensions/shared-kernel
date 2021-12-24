<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\ValueObject;

use CoreExtensions\Assert\Assert;
use CoreExtensions\SharedKernel\Domain\ValueObject;
use CoreExtensions\SharedKernel\Domain\ValueObjectTrait;
use CoreExtensions\SharedKernel\Exception\InvalidArgumentException;
use CoreExtensions\SharedKernel\Feature\StringSerializable;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Implements generic UUID based identity for Aggregate Roots.
 */
class UuidValue implements ValueObject, StringSerializable
{
    use ValueObjectTrait;

    private UuidInterface $value;

    private function __construct(UuidInterface $uuid)
    {
        $this->setValue($uuid);
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @throws InvalidUuidStringException
     * @throws \InvalidArgumentException
     *
     * @return static
     */
    public static function fromBytes(string $bytes): self
    {
        Assert::notEmpty($bytes);

        return static::fromUuid(Uuid::fromBytes($bytes));
    }

    /**
     * @throws InvalidUuidStringException
     * @throws \InvalidArgumentException
     *
     * @return static
     */
    public static function fromString(string $uuid): StringSerializable
    {
        Assert::uuid($uuid);

        return static::fromUuid(Uuid::fromString($uuid));
    }

    /**
     * @return static
     */
    public static function fromUuid(UuidInterface $uuid): self
    {
        return new static($uuid);
    }

    /**
     * @param static|string|UuidInterface $value
     *
     * @throws InvalidUuidStringException
     * @throws \InvalidArgumentException
     *
     * @return static
     */
    public static function fromValue($value): self
    {
        if ($value instanceof self) {
            return static::fromString($value->toString());
        }
        if ($value instanceof UuidInterface) {
            return static::fromUuid($value);
        }

        return static::fromString((string)$value);
    }

    /**
     * @throws UnsatisfiedDependencyException
     * @throws \InvalidArgumentException
     *
     * @return static
     */
    public static function generate(): self
    {
        try {
            return static::fromUuid(Uuid::uuid4());
        } catch (\Exception $ex) {
            throw new InvalidArgumentException($ex->getMessage(), (int)$ex->getCode(), $ex);
        }
    }

    public function toString(): string
    {
        return $this->value->toString();
    }

    public function toScalar(): string
    {
        return $this->toString();
    }

    public function bytes(): string
    {
        return $this->value->getBytes();
    }

    protected function value(): UuidInterface
    {
        return $this->value;
    }

    protected function setValue(UuidInterface $uuid): void
    {
        $this->value = $uuid;
    }
}

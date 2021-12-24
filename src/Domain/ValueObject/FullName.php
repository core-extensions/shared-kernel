<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain\ValueObject;

use CoreExtensions\SharedKernel\Domain\ValueObject;
use CoreExtensions\SharedKernel\Domain\ValueObjectTrait;
use CoreExtensions\SharedKernel\Feature\ArraySerializable;
use CoreExtensions\SharedKernel\Feature\StringSerializable;

/**
 * @final
 */
class FullName implements ValueObject, StringSerializable, ArraySerializable
{
    use ValueObjectTrait;

    private ?string $firstName;
    private ?string $middleName;
    private ?string $secondName;

    private function __construct(?string $firstName, ?string $secondName, ?string $middleName)
    {
        $this->setFirstName($firstName);
        $this->setSecondName($secondName);
        $this->setMiddleName($middleName);
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public static function fromValues(?string $firstName, ?string $secondName, ?string $middleName): self
    {
        return new self($firstName, $secondName, $middleName);
    }

    /**
     * @return static
     */
    public static function fromString(string $fullName, string $separator = ' '): StringSerializable
    {
        $parts = \explode($separator, \trim($fullName));

        switch (\count($parts)) {
            case 3:
                [$secondName, $firstName, $middleName] = $parts;

                break;
            case 2:
                [$secondName, $firstName] = $parts;
                $middleName = null;

                break;
            case 1:
                $firstName = $parts[0];
                $secondName = $middleName = null;

                break;
            default:
                $firstName = $fullName;
                $secondName = $middleName = null;

                break;
        }

        return self::fromValues($firstName, $secondName, $middleName);
    }

    /**
     * @return static
     */
    public static function fromArray(array $array): ArraySerializable
    {
        return self::fromValues(
            $array['first_name'] ?? null,
            $array['second_name'] ?? null,
            $array['middle_name'] ?? null
        );
    }

    public static function unknown(): self
    {
        return self::fromValues(null, null, null);
    }

    public function firstName(): ?string
    {
        return $this->firstName;
    }

    public function withFirstName(string $firstName): self
    {
        return static::fromValues($firstName, $this->secondName(), $this->middleName());
    }

    public function middleName(): ?string
    {
        return $this->middleName;
    }

    public function withSecondName(string $secondName): self
    {
        return static::fromValues($this->firstName(), $secondName, $this->middleName());
    }

    public function secondName(): ?string
    {
        return $this->secondName;
    }

    public function withMiddleName(string $middleName): self
    {
        return static::fromValues($this->firstName(), $this->secondName(), $middleName);
    }

    public function toArray(): array
    {
        return [
            'first_name' => $this->firstName,
            'second_name' => $this->secondName,
            'middle_name' => $this->middleName,
        ];
    }

    public function toString(): string
    {
        return \implode(
            ' ',
            \array_filter(
                [
                    $this->secondName,
                    $this->firstName,
                    $this->middleName,
                ]
            )
        );
    }

    public function toScalar(): string
    {
        return $this->toString();
    }

    private function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName ? \trim($firstName) : null;
    }

    private function setMiddleName(?string $middleName): void
    {
        $this->middleName = $middleName ? \trim($middleName) : null;
    }

    private function setSecondName(?string $secondName): void
    {
        $this->secondName = $secondName ? \trim($secondName) : null;
    }
}

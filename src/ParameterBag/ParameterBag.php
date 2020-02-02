<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\ParameterBag;

use CoreExtensions\SharedKernel\Feature\ArraySerializable;
use CoreExtensions\SharedKernel\ParameterBag\Exception\ParameterNotFoundException;

/**
 * Class ParameterBag
 * Generic bag for scalar parameters.
 */
class ParameterBag implements ArraySerializable, \JsonSerializable
{
    /**
     * @var array<string, mixed>
     */
    private $parameters;

    /**
     * @param array<string, mixed> $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return static
     */
    public static function fromArray(array $array): ArraySerializable
    {
        /** @var array<string, mixed> $array */
        return new self($array);
    }

    /**
     * @throws ParameterNotFoundException
     *
     * @return mixed
     */
    public function get(string $name)
    {
        if (!\array_key_exists($name, $this->parameters)) {
            throw ParameterNotFoundException::withName($name);
        }

        return $this->parameters[$name];
    }

    /**
     * @param mixed $value
     */
    public function set(string $name, $value): void
    {
        $this->parameters[$name] = $value;
    }

    public function has(string $name): bool
    {
        return \array_key_exists($name, $this->parameters);
    }

    /**
     * @return array<string, mixed>
     */
    public function all(): array
    {
        return $this->parameters;
    }

    public function clear(): void
    {
        $this->parameters = [];
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->all();
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->all();
    }
}

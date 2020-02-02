<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

/**
 * @template TKey of array-key
 * @template TValue
 */
interface ArraySerializable
{
    /**
     * @param array<mixed, mixed> $array
     *
     * @return static
     *
     * @psalm-param array<TKey, TValue> $array
     *
     * @psalm-return static
     */
    public static function fromArray(array $array): self;

    /**
     * @return array<mixed, mixed>
     *
     * @psalm-return array<TKey, TValue>
     */
    public function toArray(): array;
}

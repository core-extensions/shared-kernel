<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

interface StringSerializable
{
    /**
     * @return static
     */
    public static function fromString(string $value): self;

    public function toString(): string;
}

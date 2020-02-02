<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

interface IntegerSerializable
{
    /**
     * @return static
     */
    public static function fromInteger(int $value): self;

    public function toInteger(): int;
}

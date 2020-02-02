<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

interface FloatSerializable
{
    /**
     * @param float $value
     *
     * @return FloatSerializable
     */
    public static function fromFloat(float $value): self;

    public function toFloat(): float;
}

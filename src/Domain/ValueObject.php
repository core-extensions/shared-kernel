<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain;

interface ValueObject
{
    public function equalsTo($valueObject): bool;

    public function toScalar();
}

<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain;

interface ValueObject
{
    /**
     * @param mixed $valueObject
     *
     * @return bool
     */
    public function equalsTo($valueObject): bool;

    /**
     * @return mixed
     */
    public function toScalar();
}

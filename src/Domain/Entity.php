<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain;

interface Entity
{
    /**
     * @param mixed $entity
     *
     * @return bool
     */
    public function equalsTo($entity): bool;
}

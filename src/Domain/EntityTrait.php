<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain;

trait EntityTrait
{
    public function equalsTo($entity): bool
    {
        if (!$entity instanceof $this) {
            return false;
        }

        return $this->entityId() === $entity->entityId();
    }

    abstract protected function entityId(): string;
}

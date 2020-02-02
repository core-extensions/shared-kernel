<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Domain;

trait EntityTrait
{
    /**
     * @param mixed $entity
     *
     * @return bool
     */
    public function equalsTo($entity): bool
    {
        if (!$entity instanceof $this) {
            return false;
        }

        /** @var EntityTrait $entity */
        return $this->entityId() === $entity->entityId();
    }

    abstract protected function entityId(): string;
}

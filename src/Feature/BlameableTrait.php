<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

/**
 * Trait BlameableTrait
 * Simplest generic implementation.
 */
trait BlameableTrait
{
    /**
     * @var null|string
     */
    private $createdBy;
    /**
     * @var null|string
     */
    private $updatedBy;
    /**
     * @var null|string
     */
    private $deletedBy;

    protected function createdBy(): ?string
    {
        return $this->createdBy;
    }

    protected function setCreatedBy(?string $createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    protected function updatedBy(): ?string
    {
        return $this->updatedBy;
    }

    protected function setUpdatedBy(?string $updatedBy): void
    {
        $this->updatedBy = $updatedBy;
    }

    protected function deletedBy(): ?string
    {
        return $this->deletedBy;
    }

    protected function setDeletedBy(?string $deletedBy): void
    {
        $this->deletedBy = $deletedBy;
    }
}

<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

trait BlameableDtoTrait
{
    private ?string $createdBy;
    private ?string $updatedBy;
    private ?string $deletedBy;

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?string $updatedBy): void
    {
        $this->updatedBy = $updatedBy;
    }

    public function getDeletedBy(): ?string
    {
        return $this->deletedBy;
    }

    public function setDeletedBy(?string $deletedBy): void
    {
        $this->deletedBy = $deletedBy;
    }
}

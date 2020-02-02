<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

trait TimestampableTrait
{
    /**
     * @var null|\DateTimeInterface
     */
    private $createdAt;
    /**
     * @var null|\DateTimeInterface
     */
    private $updatedAt;
    /**
     * @var null|\DateTimeInterface
     */
    private $deletedAt;

    protected function createdAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    protected function setCreatedAt(?\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    protected function updatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    protected function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    protected function deletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    protected function setDeletedAt(?\DateTimeInterface $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }
}

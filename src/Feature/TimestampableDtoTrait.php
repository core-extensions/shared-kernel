<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

trait TimestampableDtoTrait
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }
}

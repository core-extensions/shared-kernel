<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

trait SoftDeleteableDtoTrait
{
    /**
     * @var bool
     */
    private $deleted = false;

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }
}

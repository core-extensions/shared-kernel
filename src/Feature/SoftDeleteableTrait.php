<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

trait SoftDeleteableTrait
{
    /**
     * @var bool
     */
    private $deleted = false;

    public function delete(): void
    {
        if ($this->isDeleted()) {
            return;
        }

        $this->doDelete();
    }

    public function restore(): void
    {
        if (!$this->isDeleted()) {
            return;
        }

        $this->doRestore();
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    abstract protected function doDelete(): void;

    abstract protected function doRestore(): void;

    protected function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }
}

<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

/**
 * Interface SoftDeleteable
 * Generic soft delete feature. In different domains probably this
 * would be implemented something else, like for example archive/restore and etc..
 */
interface SoftDeleteable
{
    public function delete(): void;

    public function restore(): void;

    public function isDeleted(): bool;
}

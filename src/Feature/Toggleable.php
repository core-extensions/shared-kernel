<?php

declare(strict_types=1);

namespace CoreExtensions\SharedKernel\Feature;

interface Toggleable
{
    public function isEnabled(): bool;

    public function enable(): void;

    public function disable(): void;
}
